<?php

namespace App\Http\Controllers\Api;

use App\Facades\JsonMessage;
use App\Services\BannersService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{
    /**
     * @var BannersService
     */
    private $bannersService;

    /**
     * BannersController constructor.
     * @param BannersService $bannersService
     */
    public function __construct(BannersService $bannersService)
    {
        $this->bannersService = $bannersService;
    }

    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->page : 1;

        try {

            $trendings = $this->bannersService->all($page);

            return JsonMessage::success($trendings);

        } catch (\Exception $e) {
            return JsonMessage::error($e->getMessage(), $e->getCode());
        }

    }
}
