<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assistant extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = ['user_id'];

    protected $primaryKey = 'user_id';

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function activity()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function issue()
    {
        return $this->hasMany('App\Models\Issue');
    }
}
