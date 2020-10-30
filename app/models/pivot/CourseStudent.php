<?php

namespace App\Models\Pivot;

use App\Models\Model;

class CourseStudent extends Model
{
    protected $table = 'course_student';

    protected $fields = [
        'course_id', 'student_id',
    ];

    protected $relations = [
        'courses' => 'course_id',
        'students' => 'student_id',
    ];
}
