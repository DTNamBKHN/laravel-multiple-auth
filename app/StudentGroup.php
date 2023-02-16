<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{

    protected $fillable = [
        'name',
    ];

    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'student_group_professor');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
