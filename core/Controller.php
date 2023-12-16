<?php
namespace Atomine\core;
class Controller
{
    public function view($path, $data = [])
    {
        include __DIR__.'/../apps/views/'.$path.'.php';
    }
}