<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login view
     * @return \Illuminate\Http\Response
     */

    public function authview() {
        return view('auth.template');
    }

    /**
     * Login Process
     * 
     * @param Illuminate\Http\Request $request
     * @return mix
     */

    public function loginProcess(Request $request) {
        if( !$request->ajax() ) {
            return response()->json([
                'message' => 'Request invalid! refresh page.'
            ],400);
        }

        $validate = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if( $validate->fails() ) {
            return response()->json([
                'message' => 'Invalid input!',
                'errors' => $validate->errors()
            ],400);
        }

        $params = $request->only([
            'email','password'
        ]);

        if( Auth::attempt($params) ) {

        }
        else {
            return response()->json([
                'message' => 'username/password salah'
            ],400);
        }
    }
}
