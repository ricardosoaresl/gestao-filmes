<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class BaseRepository
{
    /**
     * @var Client
     */
    protected $client;

    protected $token;

    /**
     * BaseRepository constructor.
     * @param Client $client
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('api.base_url'),
            'timeout' => 2.0,
        ]);
    }

    /**
     * Retorna um access token
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function generateToken(): string
    {
        if (Cache::has('_token')) {
            $this->token = Cache::get('_token');
        } else {

            $apiKey = config('api.api_key');
            $response = $this->client->get('/3/authentication/token/new', [
                'query' => ['api_key' => $apiKey]
            ]);

            $response = json_decode($response->getBody()->getContents());

            // storage the new token on the cache
            Cache::put('_token', $response->request_token, 7200);
            $this->token = $response->request_token;
        }

        return $this->token;
    }

    /**
     * Retorna a ApiKey
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return config('api.api_key');
    }
}
