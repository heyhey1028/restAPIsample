<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource as UserResource;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|string|min:8|max:255|confirmed',
            'password_confirmation'=>'required|string|min:8|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$validator->messages()
            ],200);
        }
        $user = new User;
        $user->fill($request->all());
        $user->password=bcrypt($request->password);
        $user->save();

        return response()->json([
            'status'=>'success',
            'data'=>$user
        ],200);
        
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|max:255',
            'password'=>'required|string|min:8|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'messages'=>$validator->messages()
            ],200);
        }

        if(!$token=Auth::guard('api')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return response()->json(['error'=>'Unauthorised'],401);
        }

        $user = new UserResource(User::where('email',$request->email)->first());
        return $this->respondWithToken($token,$user);

       
    }

    protected function respondWithToken($token,$user){
        return response()->json([
            'user_data' => $user,
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>Auth::guard('api')->factory()->getTTL()*60
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'status'=>'success',
            'message'=>'logout'
        ],200);
    }
}
