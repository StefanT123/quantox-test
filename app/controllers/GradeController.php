<?php

namespace App\Controllers;

use App\Core\Request;

class GradeController
{
    public function create()
    {
        if (! array_key_exists('id', $getFields = Request::getFields())) {
            throw new \Exception("You must provide student id");
        }

        $studentId = $getFields['id'];
    }
}
