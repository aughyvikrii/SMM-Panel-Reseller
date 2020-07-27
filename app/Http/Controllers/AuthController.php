<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login view
     * @return \Illuminate\Http\Response
     */

    public function login_view() {
        return view('auth.template');
    }
}
