<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'subject_id', 'class',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
