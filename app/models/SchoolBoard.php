<?php

namespace App\Models;

use App\Utilities\Outputer;

class SchoolBoard extends Model
{
    protected $table = 'school_boards';

    protected $fields = [
        'name',
    ];

    public function isPassed(Student $student)
    {
    }

    public function output(Outputer $outputer)
    {
        return $outputer->output();
    }
}
