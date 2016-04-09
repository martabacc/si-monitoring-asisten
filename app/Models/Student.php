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
        return $this->hasMany('App\Models\Presence');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
