<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['role'];

    public function user()
    {
    	return $this->hasMany('App\Models\Transaction');
    }
}
