<?php

namespace App\Services\StudentPresence;

use App\Repositories\StudentPresenceRepository;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentPresence\StudentPresenceRequest;


class StudentPresenceUpdateService
{
    private $studentPresenceRepository;

    public function __construct(StudentPresenceRepository $studentPresenceRepository, StudentRepository $studentRepository)
    {
        $this->studentPresenceRepository = $studentPresenceRepository;
        $this->studentRepository = $studentRepository;
    }

    public function update(StudentPresenceRequest $studentPresenceRequest)
    {
        $data = $studentPresenceRequest->validated();

        if(!$this->studentRepository->findByStudentId($studentPresenceRequest->student_id)) {
            throw new \Exception('Student not found', 404);
        }

        if (!$this->studentPresenceRepository->findByStudentId($studentPresenceRequest->student_id)) {
            throw new \Exception('Student presence record doesn\'t exist', 404);
        }

        $this->studentPresenceRepository->update($studentPresenceRequest->student_id, $data);
    }
}
