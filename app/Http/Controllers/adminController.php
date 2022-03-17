<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
  public function __construct()
    {
        $this->middleware('isadmin');
        
    } 
    
    function test() {
      //  if((Auth::user()->role == 2)){
        return view('dashbord.admin.test');//}
      
          
    }
    function rien() {
       // if((Auth::user()->role == 2)){
        return view('dashbord.admin.rien');//}
    } }
