<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hexagram;
use Illuminate\Http\Request;

class HexagramController extends Controller
{
    public function index() {
        $num = 33;
        $hexagram = Hexagram::where('number', $num)->get();

        $data['hexagram'] = $hexagram[0];
        $explodedTitle = explode(" - ", $data['hexagram']['title']);
        $data['hexagram']['chineseName'] =  $explodedTitle[0];
        $data['hexagram']['title'] =  $explodedTitle[1];

        return view('play', $data);
    }
}
