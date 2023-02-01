<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GraduationProject extends Model
{
    use SoftDeletes;

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
