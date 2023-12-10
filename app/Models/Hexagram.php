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

    public function setInfo() {

        $p1 = 4;
        $p2 = 5;
        $p3 = 6;
        if($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == true) {
            $this->upperTrigram = "Céu";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == false) {
            $this->upperTrigram = "Terra";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == false) {
            $this->upperTrigram = "Trovão";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == false) {
            $this->upperTrigram = "Água";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == true) {
            $this->upperTrigram = "Montanha";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == true) {
            $this->upperTrigram = "Madeira";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == true) {
            $this->upperTrigram = "Fogo";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == false) {
            $this->upperTrigram = "Lago";
        } else {
            $this->upperTrigram = "???";
        }
        $p1 = 1;
        $p2 = 2;
        $p3 = 3;
        if($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == true) {
            $this->bottomTrigram = "Céu";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == false) {
            $this->bottomTrigram = "Terra";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == false) {
            $this->bottomTrigram = "Trovão";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == false) {
            $this->bottomTrigram = "Água";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == true) {
            $this->bottomTrigram = "Montanha";
        }elseif($this->lines[$p1 - 1] == false && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == true) {
            $this->bottomTrigram = "Madeira";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == false && $this->lines[$p3 - 1] == true) {
            $this->bottomTrigram = "Fogo";
        }elseif($this->lines[$p1 - 1] == true && $this->lines[$p2 - 1] == true && $this->lines[$p3 - 1] == false) {
            $this->bottomTrigram = "Lago";
        } else {
            $this->bottomTrigram = "???";
        }

       $hexagramSelected = Hexagram::where('upper_trigram', '=', $this->upperTrigram)
                                   ->where('bottom_trigram', '=', $this->bottomTrigram)
                                    ->get();


        $this->number = $hexagramSelected[0]['number'];
        $this->symbol = $hexagramSelected[0]['symbol'];
        $this->title = $hexagramSelected[0]['title'];
        $this->upperTrigram = $hexagramSelected[0]['upper_trigram'];
        $this->bottomTrigram = $hexagramSelected[0]['bottom_trigram'];

    }

    public function getLines() {
        return json_encode($this->lines);
    }

    public function changeLine($index) {
        $this->lines[$index] = !$this->lines[$index];
        return json_encode($this->lines);
    }
}
