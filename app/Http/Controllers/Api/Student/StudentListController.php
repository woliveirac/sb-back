<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\StudentListService;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;


class StudentListController extends Controller
{
    public function index()
    {
        try {
            $studentListService = new StudentListService(new StudentRepository());
            $students = $studentListService->list();

            return response()->json($students, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
