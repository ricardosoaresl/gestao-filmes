<?php

namespace App\Services;


use App\Repositories\BannerRepository;

class BannersService
{
    /**
     * @var BannerRepository
     */
    private $bannerRepository;

    /**
     * BannersService constructor.
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param int|int $page
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all(int $page = 1)
    {
        if($page < 0) {
            throw new \Exception('Página deve ser inteiro e positivo', 400);
        }

        return $this->bannerRepository->all($page);
    }
}
