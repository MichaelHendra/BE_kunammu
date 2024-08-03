<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'displayName' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $validateData = $validator->validated();
        $validateData['saldo'] = '0';
        $validateData['image'] = 'image';

        $data = User::create($validateData);

        return response()->json($data,201);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('username', 'password');

        if(!$token = auth()->guard('api')->attempt($credentials)){
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda Salah'
            ], 401);
        }
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),
            'token'   => $token
        ], 200);
    }
    public function logout () {
        auth()->logout();
        return response()->json(['Message' => 'Logout Sukses']);
    }

}
