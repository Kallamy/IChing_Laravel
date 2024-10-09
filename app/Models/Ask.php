<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    protected $fillable = [
        'date',
        'subject',
        'result',
        'related',
        'result_lines',
        'related_lines',
        'user_id',
    ];
}
