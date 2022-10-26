<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        //dd(auth()->user());
        return view('index');
    }
}
