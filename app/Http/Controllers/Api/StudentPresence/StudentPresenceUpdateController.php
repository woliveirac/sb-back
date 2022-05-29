<?php

namespace App\Http\Controllers\Api\StudentPresence;

use App\Http\Controllers\Controller;
use App\Services\StudentPresence\StudentPresenceUpdateService;
use App\Repositories\StudentPresenceRepository;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentPresence\StudentPresenceRequest;

class StudentPresenceUpdateController extends Controller
{
    public function update(StudentPresenceRequest $studentPresenceRequest)
    {
        try {
            $studentPresenceUpdateService = new StudentPresenceUpdateService(new StudentPresenceRepository(), new StudentRepository());
            $studentPresenceUpdateService->update($studentPresenceRequest);

            return response()->json([
                'message' => 'Student presence record updated successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
