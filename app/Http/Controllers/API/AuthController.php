<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\User; 

class AuthController extends ApiController
{
    public function login() {
    	if( Auth::attempt([
			'email' => request('email'), 
			'password' => request('password')
			]) )
		{ 
			$user = Auth::user(); 
			
            return $this->responseSuccess([
				'token' => $user->createToken(env('APP_NAME'))->accessToken
			]);
        } 
        else { 
            return $this->responseUnauthorized(); 
        } 
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'c_password' => 'required|same:password', 
		]);

		if ($validator->fails()) { 
			return $this->responseError(['error'=>$validator->errors()]);            
		}

		$input = $request->all(); 
		$input['password'] = bcrypt($input['password']); 

		$user = User::create($input); 

		return $this->responseSuccess([
			'token'	=> $user->createToken(env('APP_NAME'))->accessToken,
			'name'	=> $user->name,
		]); 
    }

}
