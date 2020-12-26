<?php

namespace App\Http\Controllers\Api;

use App\Facades\JsonMessage;
use App\Repositories\DiscoverRepository;
use App\Services\DiscoverService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscoverController extends Controller
{
    /**
     * @var DiscoverService
     */
    private $service;

    /**
     * DiscoverController constructor.
     * @param DiscoverService $service
     */
    public function __construct(DiscoverService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        try {

            $page = $request->has('page') ? $request->page : 1;
            $genres = $request->has('genres') ? $request->genres : null;


            $discovers = $this->service->search($page, $genres);

            return JsonMessage::success($discovers);

        } catch (\Exception $e) {
            return JsonMessage::error($e->getMessage(), $e->getCode());
        }
    }
}
