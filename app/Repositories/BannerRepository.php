<?php

namespace App\Repositories;

class BannerRepository extends BaseRepository
{
    /**
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all(int $page)
    {
        $endPoint = '/3/movie/upcoming';
        $path = config('api.base_url').$endPoint;

        $response =  $this->client->get($path, [
            'query' => [
                'api_key' => $this->getApiKey(),
                'page' => $page
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
