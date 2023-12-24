<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hexagram extends Model
{
    use HasFactory;

    public $lines = [true, false, false, true, true, false];

    public $number= 3;
    public $title = "";
    public $upperTrigram = "";
    public $bottomTrigram = "";


    protected $fillable = [
        'number',
        'symbol',
        'title',
        'upper_trigram',
        'bottom_trigram',
    ];

}
