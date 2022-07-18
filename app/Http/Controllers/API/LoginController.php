<?php

namespace App\Http\Controllers\API;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $this->validate($req, [
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where("email", $req->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Login Failed!'], 401);
        }

        $token = bin2hex(random_bytes(40));

        $user->update([
            'token' => $token
        ]);

        return response()->json($user);
    }
}
