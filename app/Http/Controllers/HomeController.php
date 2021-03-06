<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $userFirst = Auth::user()->first_login;
        }else{
            $userFirst = false;
        }
        return view('home')->with('first_login',$userFirst);
    }
}

