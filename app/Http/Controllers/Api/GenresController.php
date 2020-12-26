<?php

namespace App\Http\Controllers\Api;

use App\Facades\JsonMessage;
use App\Repositories\GenreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    /**
     * @var GenreRepository
     */
    private $repository;

    /**
     * GenresController constructor.
     * @param GenreRepository $repository
     */
    public function __construct(GenreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        return JsonMessage::success($this->repository->all());
    }
}
