<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function __construct(){
        //$this->middleware('auth:api');
    }
    public function configureApplication(Request $request){
        //this method returns the configuration informations for the android application
        // $request->validate();
        
    }
    public function index(){
        //this method returns the configuration of the user
        echo "here";
        return response(auth()->user());
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);
    
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();
    
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }
    
        return $this->sendFailedLoginResponse($request);
    }

}
