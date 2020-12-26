<?php

namespace App\Services;

use App\Repositories\DiscoverRepository;

class DiscoverService
{
    /**
     * @var DiscoverRepository
     */
    private $discoverRepository;

    /**
     * DiscoverService constructor.
     * @param DiscoverRepository $discoverRepository
     */
    public function __construct(DiscoverRepository $discoverRepository)
    {
        $this->discoverRepository = $discoverRepository;
    }

    /**
     * @param int|int $page
     * @param string $genres
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(int $page = 1, $genres = null)
    {
        if ($page < 1) {
            throw new \Exception('page deve ser inteiro e positivo');
        }

        return $this->discoverRepository->search($page, $genres);
    }
}
