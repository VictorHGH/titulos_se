<?php

use App\Core\Route;
use App\Domains\User\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
