<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'user_id'
    ];

    protected $primaryKey = 'user_id';

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function presence()
    {
        return $this->belongsToMany('App\Models\Activity', 'presences', 'student_id', 'activity_id')->withTimestamps();
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Models\Classes', 'classes_students', 'student_id', 'class_id')->withTimestamps();
    }
}
