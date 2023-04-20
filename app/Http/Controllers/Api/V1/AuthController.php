<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    /** 
    *Create user
    *@param Request $request
    *@return User
    */

    public function createUser(Request $request){
      try{
        $validateUser = Validator::make($request->all(),
        [
            'email_address' => 'required|email|unique:users,email_address',
            'password'=> 'required'
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' =>false,
                'message' => 'Validation Error',
                'errors' => $validateUser->errors()
            ],401);

        }

        $user = User::create([
            'email_address'=> $request->email_address,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' =>true,
            'message' => 'User created successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);


      }catch(\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ],500);
      }
    }

    public function loginUser(Request $request){
        try {
                $validateUser = Validator::make($request->all(),
                [
                    'email_address' => 'required|email',
                    'password'=> 'required'
                ]);
                if($validateUser->fails()){
                    return response()->json([
                        'status' =>false,
                        'message' => 'Validation Error',
                        'errors' => $validateUser->errors()
                    ],401);
                }

                if(!Auth::attempt($request->only(['email_address','password']))){
                    return response()->json([
                        'status'=>false,
                        'message'=>'Email & password do not match',
                    ],401);
                }

                $user = User::where('email_address', $request->email_address)->first();
                return response()->json([
                    'status' =>true,
                    'message' => 'User LoggedIn successfully',
                    'token' => $user->createToken('API TOKEN')->plainTextToken
                ],200);
            

        }
        catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
          }

    }
}
