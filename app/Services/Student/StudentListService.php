<?php

namespace App\Services\Student;

use App\Repositories\StudentRepository;

class StudentListService
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function list()
    {
        return $this->studentRepository->getAll();
    }
}
