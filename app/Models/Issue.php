<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'assistant_id', 'activity_id', 'description', 'urgency', 'solution',
    ];

    public function assistant()
    {
        return $this->belongsTo('App\Models\Assistant');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }
}
