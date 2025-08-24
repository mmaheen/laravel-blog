<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('sanctum.register');
    }
}
