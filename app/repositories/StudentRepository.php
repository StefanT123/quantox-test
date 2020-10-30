<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\Student;

class StudentRepository
{
    protected $student;
    protected $query;
    protected $table;

    public function __construct(Student $student)
    {
        $this->student = $student;
        $this->query = App::get('db');
        $this->table = $student->getTable();
    }

    public function all(string $fields = '*')
    {
        return $this->query->all($this->table, $fields);
    }

    public function withRelation(string $relation)
    {
        try {
            $this->query->join(
                $this->table,
                $relation,
                $this->student->getRelation($relation)
            );

            return $this;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert(array $params)
    {
        $fillable = [];

        foreach ($this->student->getFields() as $field) {
            if (array_key_exists($field, $params)) {
                $fillable[$field] = $params[$field];
            }
        }

        return $this->query->insert($this->table, $fillable);
    }
}
