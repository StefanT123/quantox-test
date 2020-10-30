<?php

namespace App\Repositories;

class StudentRepository extends Repository
{
    public function addCourse(int $studentId, int $id)
    {
        return $this->query->insert('course_student', [
            'student_id' => $studentId,
            'course_id' => $id,
        ]);
    }
}
