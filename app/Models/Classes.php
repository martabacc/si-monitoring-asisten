<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'subject_id', 'class',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function activity()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'classes_students', 'class_id', 'student_id')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher', 'classes_teachers', 'class_id', 'teacher_id')->withTimestamps();
    }

    public function assistants()
    {
        return $this->belongsToMany('App\Models\Assistant', 'classes_assistants', 'class_id', 'assistant_id')->withTimestamps();
    }
}
