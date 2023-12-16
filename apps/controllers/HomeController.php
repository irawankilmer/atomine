<?php
namespace Atomine\apps\controllers;
use Atomine\core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('welcome');
    }
}