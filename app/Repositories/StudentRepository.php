<?php

namespace App\Repositories;

use App\Entities\Student;

class StudentRepository
{

    private $studentEntity;

    public function __construct()
    {
        $this->studentEntity = new Student();
    }

    public function getAll()
    {
        return $this->studentEntity->with('studentPresences')->get();
    }

    public function create($data)
    {
        $this->studentEntity->create($data);
    }

    public function update($studentId, $data)
    {
        $this->studentEntity->where('id', $studentId)->update($data);
    }

    public function findByStudentId($studentId)
    {
        return $this->studentEntity->where('id', $studentId)->first();
    }
    
    public function delete($studentId)
    {
        $this->studentEntity->where('id', $studentId)->delete();
    }


}
