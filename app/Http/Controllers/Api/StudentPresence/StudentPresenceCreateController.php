<?php

namespace App\Http\Controllers\Api\StudentPresence;

use App\Http\Controllers\Controller;
use App\Services\StudentPresence\StudentPresenceCreateService;
use App\Repositories\StudentPresenceRepository;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentPresence\StudentPresenceRequest;

class StudentPresenceCreateController extends Controller
{
    public function create(StudentPresenceRequest $studentPresenceRequest)
    {
        try {
            $studentPresenceCreateService = new StudentPresenceCreateService(new StudentPresenceRepository(), new StudentRepository());
            $studentPresenceCreateService->create($studentPresenceRequest);

            return response()->json([
                'message' => 'Student presence record created successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
