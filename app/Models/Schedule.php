<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_id', 'name', 'day', 'place', 'schedule',
    ];

    public function classes()
    {
        return $this->belongsTo('class');
    }
}
