<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login view
     * @return \Illuminate\Http\Response
     */

    public function authview() {
        return view('auth.template');
    }
}
