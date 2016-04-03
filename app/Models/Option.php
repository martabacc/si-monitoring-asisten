<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'question_id', 'answer',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
