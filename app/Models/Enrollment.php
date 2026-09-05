<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'phone',
        'payment_method',
    ];

    // علاقة الاشتراك بالكورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // علاقة الاشتراك بالمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}