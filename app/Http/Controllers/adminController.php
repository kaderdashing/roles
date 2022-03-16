<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
 /*   public function __construct()
    {
        $this->middleware['auth'];

        
    }*/
    function test() {
        return view('dashbord.admin.test');
    }
    function rien() {
        return view('dashbord.admin.rien');
    }
}
