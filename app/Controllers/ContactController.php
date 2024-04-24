<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\JsonService;

class ContactController extends Controller
{
    public function create()
    {
        JsonService::create();

        $this->view->redirect('http://localhost');
    }

    public function destroy(): void
    {
        JsonService::delete((int)$this->query['id']);

        $this->view->redirect('http://localhost');
    }
}