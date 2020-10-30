<?php

namespace App\Models;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fields = [
        'value', 'course_id', 'student_id',
    ];
}
