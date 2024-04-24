<?php

namespace App\Core;

class View
{
    protected string $viewName = 'index';

    public function redirect(string $url): void
    {
        header('location: ' . $url);
        exit;
    }

    public function render(?string $title = null, ?array $params = null): void
    {
        $path = appPath() . "/Views/$this->viewName.php";

        if ($params) {
            foreach ($params as $key => $value) {
                ${"$key"} = $value;
            }
        }

        if (file_exists($path)) {
            require_once appPath() . "/Views/$this->viewName.php";
        }
    }

    /**
     * @param int $code
     * @return void
     */
    public static function renderError(int $code): void
    {
        http_response_code($code);
        $path = appPath() . "/Views/errors/$code.php";
        if (file_exists($path)) {
            require_once $path;
        } else {
            http_response_code(500);
            echo 'Can\'t find error view';
        }
        exit;
    }
}