<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Register api
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255',
                'confirm_password' => 'required|same:password'

            ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Not Registered', 'errors' => $validator->errors()], 400);
        }
        $user = User::create([
            'remember_token' => Str::random(30),
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);


        return response()->json(['message' => 'successfully saved.', 'token' => $user->remember_token], 200);
    }

    /**
     * login api
     */
    public function login()
    {

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $token = Str::random(5);
        /*    $token = Str::random(30);
            DB::table('users')
                ->where('email', request('email'))
                ->update(['remember_token' => $token]);
            return response()->json(['success' => 'successful', 'token' => $token], 200);*/
            $user = Auth::user();
            $success['token'] =  $user->createToken($token)-> accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Testing Authentication
     */
    public function details()
    {
        return response()->json(['success' => 'successful'], 200);

    }
}
