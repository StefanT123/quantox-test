<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\Student;

class StudentRepository
{
    protected $student;
    protected $query;

    public function __construct(Student $student)
    {
        $this->student = $student;
        $this->query = App::get('db');
    }

    public function all(string $fields = '*')
    {
        return $this->query->all($this->student->getTable(), $fields);
    }

    public function withRelation(string $relation)
    {
        try {
            $this->query->join(
                $this->student->getTable(),
                $relation,
                $this->student->getRelation($relation)
            );

            return $this;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
