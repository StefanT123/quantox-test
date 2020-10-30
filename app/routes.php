<?php

use App\Controllers\HomeController;
use App\Controllers\GradeController;
use App\Controllers\StudentController;
use App\Controllers\StudentCourseController;

$router->get('', [HomeController::class, 'index']);
$router->get('students', [StudentController::class, 'index']);
$router->get('student/create', [StudentController::class, 'create']);
$router->post('student/create', [StudentController::class, 'store']);
$router->get('student/grade/create', [GradeController::class, 'create']);
$router->get('student/course/add', [StudentCourseController::class, 'create']);
$router->post('student/courses/add', [StudentCourseController::class, 'store']);
