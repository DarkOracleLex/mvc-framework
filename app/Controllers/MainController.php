<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\JsonService;

class MainController extends Controller
{
    public function index(): void
    {
        $contacts = JsonService::all();

        $this->view->render(params: ['contacts' => $contacts]);
    }
}