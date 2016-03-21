<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'assistant_id', 'title', 'description',
    ];

    public function assistant()
    {
        return $this->belongsTo('App\Models\Assistant', 'assistant_id', 'user_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
