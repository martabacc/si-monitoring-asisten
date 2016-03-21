<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
        return $this->hasMany('App\Models\Presence');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
