<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'privilege_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function privilege()
    {
    	return $this->belongsTo('App\Models\Privilege');
    }

    public function teachers()
    {
    	return $this->hasOne('App\Models\Teacher');
    }

    public function assistant()
    {
    	return $this->hasOne('App\Models\Assistant');
    }

    public function student()
    {
    	return $this->hasOne('App\Models\Student');
    }
}
