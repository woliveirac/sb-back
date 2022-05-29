<?php

namespace App\Services\StudentPresence;

use App\Repositories\StudentPresenceRepository;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentPresence\StudentPresenceRequest;

class StudentPresenceCreateService
{
    private $studentPresenceRepository;

    public function __construct(StudentPresenceRepository $studentPresenceRepository, StudentRepository $studentRepository)
    {
        $this->studentPresenceRepository = $studentPresenceRepository;
        $this->studentRepository = $studentRepository;
    }

    public function create(StudentPresenceRequest $studentPresenceRequest)
    {
        $data = $studentPresenceRequest->validated();

        if(!$this->studentRepository->findByStudentId($studentPresenceRequest->student_id)) {
            throw new \Exception('Student not found', 404);
        }

        if ($this->studentPresenceRepository->findByStudentId($studentPresenceRequest->student_id)) {
            throw new \Exception('Student presence already exists', 409);
        }

        $this->studentPresenceRepository->create(array_merge(['student_id' => $studentPresenceRequest->student_id], $data));
    }
}
