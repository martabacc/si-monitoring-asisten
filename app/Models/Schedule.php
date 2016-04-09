<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'class_id', 'name', 'day', 'place', 'schedule',
    ];

    public function classes()
    {
        return $this->belongsTo('class');
    }
}
