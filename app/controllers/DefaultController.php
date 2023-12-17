<?php
namespace Atomine\app\controllers;
use Atomine\core\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        $this->view('welcome');
    }
}