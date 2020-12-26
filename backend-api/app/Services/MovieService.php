<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    /**
     * @var MovieRepository
     */
    private $movieRepository;

    /**
     * MovieService constructor.
     * @param MovieRepository $movieRepository
     */
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @param string $name
     * @param int|int $page
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(string $name, int $page = 1)
    {
        if(empty($name)) {
            throw new \Exception('Informe a query de busca', 400);
        }

        return $this->movieRepository->search($name, $page);
    }

    public function find(int $movie_id)
    {
        return $this->movieRepository->find($movie_id);
    }
}
