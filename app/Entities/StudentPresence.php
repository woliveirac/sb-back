<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentPresence extends Model
{
    protected $fillable = [
        'is_present',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
