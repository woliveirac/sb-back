<?php

namespace App\Services\StudentPresence;

use App\Repositories\StudentPresenceRepository;

class StudentPresenceListService
{
    private $studentPresenceRepository;

    public function __construct(StudentPresenceRepository $studentPresenceRepository)
    {
        $this->studentPresenceRepository = $studentPresenceRepository;
    }

    public function list()
    {
        return $this->studentPresenceRepository->getAll();
    }
}
