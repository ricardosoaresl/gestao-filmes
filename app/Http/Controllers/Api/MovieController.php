<?php

namespace App\Http\Controllers\Api;

use App\Facades\JsonMessage;
use App\Repositories\MovieRepository;
use App\Services\MovieService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MovieController extends Controller
{
    /**
     * @var MovieService
     */
    private $movieService;

    /**
     * MovieController constructor.
     * @param MovieService $movieService
     */
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     *
     * @param string|string $query
     * @param int|int $page
     * @param bool|bool $include_adult
     */
    public function search(Request $request)
    {
        try {

            $page = $request->has('page') ? $request->page : 1;
            $movies = $this->movieService->search($request->name, $page);

            return JsonMessage::success($movies);

        } catch (\Exception $e) {
            return JsonMessage::error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param $movie_id
     * @return mixed
     */
    public function show($movie_id)
    {
        try {

            $movie = $this->movieService->find($movie_id);
            return JsonMessage::success($movie);

        } catch (\Exception $e) {
            return JsonMessage::error($e->getMessage(), $e->getCode());
        }
    }
}
