<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(),[
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'index_number' => 'required|string|min:9|max:9',
            'year_of_study' => 'required|integer|min:0|max:6',
            'faculty' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'index_number'=>$request->index_number,
            'year_of_study'=>$request->year_of_study,
            'faculty'=>$request->faculty,
            'password'=>Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user,'auth_token'=>$token, 'token_type'=>'Bearer']);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        return response()->json(['message'=>'Unauthorized'],401);

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'Hi '. $user->first_name. ' welcome to home ', 'access_token'=>$token, 'token_type'=>'Bearer']);
    }

}
