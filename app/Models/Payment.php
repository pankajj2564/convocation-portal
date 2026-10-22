<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'transaction_id',
        'amount',
        'status',
        'gateway_response',
    ];

    // Payment kis student ki hai, usko link karne ke liye relation
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}