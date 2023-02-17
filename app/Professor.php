<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class Professor extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guard = 'professor';

    protected $fillable = [
        'name', 'avatar', 'email', 'password',
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
