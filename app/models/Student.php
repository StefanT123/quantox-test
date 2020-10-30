<?php

namespace App\Models;

class Student extends Model
{
    protected $table = 'students';

    protected $fields = [
        'name', 'school_board_id',
    ];

    protected $relations = [
        'school_boards' => 'school_board_id',
    ];
}
