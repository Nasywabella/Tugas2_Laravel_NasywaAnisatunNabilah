<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        //1. setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        //2. cek validator
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        //3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //4. cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ]);
        }

        //5. cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation failed'], 409); //conflict
    }


    public function login(Request $request){
        //1. setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //2. cek validator
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        //3. get kredensial dari request
        $credentials = $request->only('email','password');

        //4. cek isFailed
        if (!$token = auth()->guard('api')->attempt( $credentials )) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda Salah!'
            ],401);
        }

        //5. cek isSuccess
        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
       ], 200);
    }

    //logout
    public function logout(Request $request){
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ], 200);

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed'
            ], 500);
        }
    }
}