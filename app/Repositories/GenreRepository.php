<?php

namespace App\Repositories;

class GenreRepository extends BaseRepository
{
    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all()
    {
        $endPoint = '/3/genre/movie/list';
        $path = config('api.base_url').$endPoint;

        $response =  $this->client->get($path, [
            'query' => [
                'api_key' => $this->getApiKey()
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
