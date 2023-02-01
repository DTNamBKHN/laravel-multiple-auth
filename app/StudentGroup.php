<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGroup extends Model
{
    use SoftDeletes;

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
