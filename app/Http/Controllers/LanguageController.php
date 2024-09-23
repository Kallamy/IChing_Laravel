<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LanguageController extends Controller
{
    public function setLang($lang) {
        session(['locale' => $lang]);
        App::setLocale(session('locale'));
        // $content = view('learn.history');
        // return view('learn' , compact('content'));
        return redirect()->back();
    }
}
