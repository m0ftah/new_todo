<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class AuthController extends Controller
{
   public function login(Request $request){ 
    $validated = $request->validate([   
        'email' => 'required|email',
        'password' => 'required'
    ]);  
    if( ! Auth::attempt($validated)){
        return response()->json([
            'message' => 'login infomation invalid'
        ], 401);
    
    }
    $user = User::where('email', $validated['email'])->first();
    return  response()->json([
        'access_token' => $user->createToken('authToken')->plainTextToken,
        'token_type' => 'Bearer'
    ]);
   }
}
