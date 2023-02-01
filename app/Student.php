<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'student_group_id', 'avatar', 'email', 'password', 'phone_number', 'is_student'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student_group()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function graduation_project()
    {
        return $this->hasOne('App\GraduationProject');
    }
}
