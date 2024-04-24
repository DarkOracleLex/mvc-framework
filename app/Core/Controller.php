<?php

namespace App\Core;

abstract class Controller
{
    public array $route;
    public View $view;
    public ?array $query;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->view = new View();

        $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset(parse_url($url)['query'])) {
            parse_str(parse_url($url)['query'], $this->query);
        }
    }
}