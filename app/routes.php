<?php

use App\Controllers\HomeController;
use App\Controllers\StudentController;

$router->get('', [HomeController::class, 'index']);
$router->get('students', [StudentController::class, 'index']);
