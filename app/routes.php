<?php
use Atomine\core\Route;
use Atomine\app\controllers\DefaultController;

Route::get('/', [DefaultController::class, 'index']);
