<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Course;
use App\Models\Student;
use App\Repositories\CourseRepository;
use App\Repositories\StudentRepository;

class StudentCourseController
{
    public function create()
    {
        $courses = CourseRepository::for(new Course)
            ->all()
            ->get();

        return view('student/addCourse', ['courses' => $courses]);
    }

    public function store()
    {
        $fields = Request::postFields();
        $studentId = $fields['studentId'];
        $coursesIds = $fields['coursesIds'];

        $repo = StudentRepository::for(new Student);

        foreach ($coursesIds as $courseId) {
            $repo->addCourse($studentId, $courseId);
        }

        redirect('students');
    }
}
