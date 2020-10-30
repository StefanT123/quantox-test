<?php

namespace App\Controllers;

use App\Models\Student;
use App\Repositories\StudentRepository;

class StudentController
{
    public function index()
    {
        $repo = new StudentRepository(new Student);
        $students = $repo
            ->withRelation('school_boards')
            ->all('students.*, school_boards.name as school_name')
            ->get();

        return view('student/index', ['students' => $students]);
    }
}
