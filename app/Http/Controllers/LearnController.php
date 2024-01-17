<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hexagram;
use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function history() {
        $content = view('learn.history');
        return view('learn', compact('content'));
    }
    public function about() {
        $content = view('learn.about');
        return view('learn', compact('content'));
    }
    public function trigrams() {
        $content = view('learn.trigrams');
        return view('learn', compact('content'));
    }
    public function hexagrams() {
        $data = [];
        // $data['hexagrams'] = Hexagram::all();
        $content = view('learn.hexagrams');

        return view('learn', compact('content'));
    }
}
