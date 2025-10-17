<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * Show the unauthorized access page
     */
    public function unauthorized()
    {
        return view('errors.unauthorized');
    }
}
