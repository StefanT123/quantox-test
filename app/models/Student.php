<?php

namespace App\Models;

class Student extends Model
{
    protected $table = 'students';

    protected $fields = [
        'name',
    ];

    protected $relations = [
        'school_boards' => 'school_board_id',
    ];
}