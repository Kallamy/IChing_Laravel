<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HexagramController extends Controller
{
    public function index() {
        $data = [];
        $data['hexagram'] = ['number' => 25, 'symbol' => "無妄", 'title' => "Wu Wang - Inocência", 'upperTrigram' => "Céu", 'bottomTrigram' => "Trovão"];
        $lines = [true, false, false, true, true, true];
        $data['hexagram']['lines'] = json_encode($lines);
        $data['hexagram']['chineseName'] = explode( " - ",  $data['hexagram']['title']);
        $data['hexagram']['title'] = $data['hexagram']['chineseName'][1];
        $data['hexagram']['chineseName'] = $data['hexagram']['chineseName'][0];

        return view('play', $data);
    }
}
