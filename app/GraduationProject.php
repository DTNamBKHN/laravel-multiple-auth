<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraduationProject extends Model
{

    protected $fillable = [
        'project_name', 'project_detail', 'professor_id', 'student_id', 'semester'
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
