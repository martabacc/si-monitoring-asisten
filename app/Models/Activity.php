<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'assistant_id', 'name', 'date', 'duration', 'notes',
    ];

    public function assistant()
    {
        return $this->belongsTo('App\Models\Assistant', 'assistant_id', 'user_id');
    }

    public function presence()
    {
        return $this->hasMany('App\Models\Presence');
    }
}
