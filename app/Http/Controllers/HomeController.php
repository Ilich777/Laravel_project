<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomePage() {
        return "<h1>Home page</h1>";
    }

}
