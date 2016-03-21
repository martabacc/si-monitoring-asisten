<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'questionnaire_id', 'question_id', 'student_id', 'option_id',
    ];

    public function questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'user_id');
    }

    public function option()
    {
        return $this->belongsTo('App\Models\Option');
    }
}
