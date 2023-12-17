<?php
namespace Atomine\core;
class Controller
{
    public function view($path, $data = [])
    {
        include __DIR__ . '/../app/views/' .$path.'.php';
    }

    public function model($model)
    {
        try {
            return new $model;
        } catch (\Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

}