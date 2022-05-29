<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function studentPresences()
    {
        return $this->hasMany(StudentPresence::class);
    }
}
