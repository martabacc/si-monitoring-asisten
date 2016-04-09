<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
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
