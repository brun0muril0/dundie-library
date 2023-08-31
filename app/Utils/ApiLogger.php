<?php

namespace App\Utils;

use Exception;
use Illuminate\Support\Facades\Log;

class ApiLogger
{
    public static function info(string $class, string $method, string $message)
    {
        Log::info('[' . $class . '][' . $method . '][' . $message . ']');
    }

    public static function error(string $class, string $method, string $message)
    {
        Log::error('[' . $class . '][' . $method . '][' . $message . ']');
    }

    public static function exception(string $class, string $method, Exception $error)
    {
        Log::error('[' . $class . '][' . $method . '][Linha: ' . $error->getLine() . '][Erro: ' . $error->getMessage() . ']');
    }

    public static function debug(string $class, string $method, string $message)
    {
        Log::debug('[' . $class . '][' . $method . '][' . $message . ']');    }
}