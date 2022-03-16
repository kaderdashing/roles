<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class doyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('isdoyen');
      //  $this->middleware('preventBackHistory');

    }
    function creer() {
        return view('dashbord.doyen.creer');
    }
    function settings() {
        return view('dashbord.doyen.settings');
    }
}
