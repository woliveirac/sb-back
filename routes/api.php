<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('students')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\Student\StudentListController::class, 'index']);
    Route::post('/{student_id}/presence',[App\Http\Controllers\Api\StudentPresence\StudentPresenceCreateController::class, 'create']);
    Route::patch('/{student_id}/presence',[App\Http\Controllers\Api\StudentPresence\StudentPresenceUpdateController::class, 'update']);
});
