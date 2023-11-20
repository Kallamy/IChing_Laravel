<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class SiteController extends Controller
{


    public function layout() {
        return view('site');
    }

    public function components() {
        return view('comp');
    }

    public function index2() {
        return view('include');
    }

    public function index() {


        $data =[
           'ingredientes' => [
            'farinha',
            'ovos',
            'chocolate',
            'leite'
           ]
        ];

        return view('bemvindo', $data);
    }

}
