<?php
use Atomine\core\Route;
use Atomine\apps\controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/siswa/{id}', [HomeController::class, 'update']);