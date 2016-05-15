<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'assistant_id', 'activity_id', 'problem', 'urgency', 'solution',
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
