<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Adjust this to the name of your view file, e.g., 'welcome', if it's different.
    }
}
