<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'student_id', 'activity_id', 'notes',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'user_id');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }
}
