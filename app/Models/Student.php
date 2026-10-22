<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'roll_no',
        'name',
        'email',
        'phone',
        'degree',
        'branch',
        'passing_year',
        'profile_completed',
        'is_registered',
    ];

    // Student ka ek payment record ho sakta hai
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}