<?php

namespace App\Repositories;

class MovieRepository extends BaseRepository
{
    /**
     * @param string $name
     * @param int|int $page
     * @param bool|bool $include_adult
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(string $name, int $page = 1, bool $include_adult = true)
    {

        $response = $this->client->get('/3/search/movie', [
            'query' => [
                'api_key' => $this->getApiKey(),
                'query' => $name,
                'page' => $page,
                'include_adult' => $include_adult,
            ]
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * @param int $movie_id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find(int $movie_id)
    {
        $response = $this->client->get("/3/movie/{$movie_id}", [
            'query' => [
                'api_key' => $this->getApiKey(),
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
