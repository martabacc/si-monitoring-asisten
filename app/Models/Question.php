<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'question',
    ];

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function option()
    {
        return $this->hasMany('App\Models\Option');
    }

    public function questionnaire()
    {
        return $this->belongsToMany('App\Models\Question', 'questionnaire_question', 'question_id', 'questionnaire_id')->withTimestamps();
    }
}
