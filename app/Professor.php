<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'professor';

    protected $fillable = [
        'name', 'avatar', 'email', 'password', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student_groups()
    {
        return $this->belongsToMany(StudentGroup::class, 'student_group_professor');
    }

    public function graduation_projects()
    {
        return $this->hasMany(GraduationProject::class);
    }
}
