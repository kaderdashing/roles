<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditeurController extends Controller
{
    public function index()
    {
        return view('editeur/home') ;
    }
    
}
