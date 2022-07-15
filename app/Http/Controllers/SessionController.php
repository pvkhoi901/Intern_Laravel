<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{
    public function index(){

        Session::put('Name', ['Khoi']);
        Session::push('Name', 'Hoa');
        Session::put('age', [10, 20, 30]);

        // if(Session::has('age')){
        //     dd(Session::get('age'));
        // } else{
        //     dd('Name does not exist!');
        // }
        // Session::forget('age');
        Session::flush();

        dd(Session::all());
        

        return view('session.index'); 
    }
    public function about(){

        return view('session.about');
    }
    

}
