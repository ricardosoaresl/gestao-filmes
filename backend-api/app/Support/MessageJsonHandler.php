<?php

namespace App\Support;

use Illuminate\Support\Facades\Facade;

class MessageJsonHandler extends Facade
{
    /**
     * @param string|string $msg
     * @param int|int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $msg = 'success', int $code = 400)
    {
        return response()->json([
            'msg' => $msg,
            'status' => 'error',
            'code' => $code
        ]);
    }

    /**
     * @param $items
     * @param int|int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($items, int $code = 200)
    {
        return response()->json($items, $code);
    }
}
