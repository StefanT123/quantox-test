<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Student;
use App\Models\SchoolBoard;
use App\Repositories\StudentRepository;
use App\Repositories\SchoolBoardRepository;

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

    public function create()
    {
        $schoolBoards = (new SchoolBoardRepository(new SchoolBoard))
            ->all()
            ->get();

        return view('student/create', ['schoolBoards' => $schoolBoards]);
    }

    public function store()
    {
        $fields = Request::postFields();

        $repo = new StudentRepository(new Student);

        if ($repo->insert($fields)) {
            redirect('students');
        }

        die('Faild to create new student');
    }
}
