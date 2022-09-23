<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Rules\Password;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(Request $request)
    { 


        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->only('email', 'password');
        $loginUser = Auth::attempt($input);

        $tt = Session()->regenerate();
        return response()->json([
            'success' => true,
            'token' => $loginUser,
            'tokenn' => session()->token(),
        ]);
    }
}
