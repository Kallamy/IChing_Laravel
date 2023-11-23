<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hexagram extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'symbol',
        'title',
        'upper_trigram',
        'bottom_trigram',
    ];
}
