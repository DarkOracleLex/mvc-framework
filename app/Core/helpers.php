<?php

use App\Core\View;

if (!function_exists('appPath')) {
    function appPath(): bool|string
    {
        return realpath(dirname(__FILE__) . '/..');
    }
}

if (!function_exists('abort')) {
    function abort(int $errorCode): void
    {
        View::renderError($errorCode);
    }
}