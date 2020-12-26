<?php

namespace App\Repositories;

class DiscoverRepository extends BaseRepository
{

    /**
     * @param int $page
     * @param null $genres
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($page = 1, $genres = null)
    {
        $endPoint = '/3/discover/movie';
        $path = config('api.base_url') . $endPoint;

        $query = [];
        $query['page'] = $page;
        $query['api_key'] = $this->getApiKey();

        if (!is_null($genres)) {
            $query['with_genres'] = $genres;
        }

        $response = $this->client->get($path, [
            'query' => $query
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
