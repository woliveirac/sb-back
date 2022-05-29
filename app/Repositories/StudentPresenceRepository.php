<?php

namespace App\Repositories;

use App\Entities\StudentPresence;

class StudentPresenceRepository
{

    private $studentPresenceEntity;

    public function __construct()
    {
        $this->studentPresenceEntity = new StudentPresence();
    }

    public function getAll()
    {
        return $this->studentPresenceEntity->with('student')->get();
    }

    public function create($data)
    {
        $this->studentPresenceEntity->create($data);
    }

    public function update($studentId, $data)
    {
        $this->studentPresenceEntity->where('student_id', $studentId)->update($data);
    }

    public function findByStudentId($studentId)
    {
        return $this->studentPresenceEntity->where('student_id', $studentId)->first();
    }
}
