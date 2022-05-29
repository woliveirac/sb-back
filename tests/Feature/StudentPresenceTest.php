<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Entities\Student;
use Tests\TestCase;

class StudentPresenceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_create_presence_of_student()
    {

        $student = factory(Student::class)->create();

        $response = $this->json('POST', "/api/students/{$student->id}/presence", [
            'is_present' => true
        ]);

        $response->assertStatus(201);

        $response->assertJson([
            'message' => 'Student presence record created successfully',
        ]);

        $this->assertDatabaseHas('student_presences', [
            'student_id' => $student->id,
            'is_present' => true
        ]);
    }

    /** @test */
    public function should_update_presence_of_student()
    {
        $student = factory(Student::class)->create();

        $student->studentPresences()->create([
            'is_present' => true
        ]);

        $response = $this->json('PATCH', "/api/students/{$student->id}/presence", [
            'is_present' => false
        ]);

        $response->assertStatus(201);

        $response->assertJson([
            'message' => 'Student presence record updated successfully',
        ]);

        $this->assertDatabaseHas('student_presences', [
            'student_id' => $student->id,
            'is_present' => false
        ]);

        $this->assertDatabaseMissing('student_presences', [
            'student_id' => $student->id,
            'is_present' => true
        ]);
    }

    /** @test */
    public function should_return_error_if_creating_presence_of_non_student()
    {
        $response = $this->json('POST', "/api/students/1/presence", [
            'is_present' => true
        ]);

        $response->assertStatus(404);

        $response->assertJson([
            'error' => 'Student not found',
        ]);
    }

    /** @test */
    public function should_return_error_if_updating_presence_of_non_student()
    {
        $response = $this->json('PATCH', "/api/students/1/presence", [
            'is_present' => true
        ]);

        $response->assertStatus(404);

        $response->assertJson([
            'error' => 'Student not found',
        ]);
    }
}
