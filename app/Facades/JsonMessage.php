<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class JsonMessage
 *
 * @method static success($result, int $code)
 * @method static error(string $message, int $code)
 */
class JsonMessage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jsonMessage';
    }
}
