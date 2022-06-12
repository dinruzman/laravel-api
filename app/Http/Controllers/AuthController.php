<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            "name" =>"required|string",
            "email" =>"required|string|unique:users,email",
            "password"=>"required|string|confirmed",
        ]);

        $user = User::create([
            "name"=> $fields["name"],
            "email"=>$fields["email"],
            "password"=>$fields["password"],
        ]);

        $token = $user->createToken('token-name')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token ,
        ];

        return response($response,201);
    }
}
