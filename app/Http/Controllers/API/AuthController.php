<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    //
    public function createUnit(Request $request){
       //this method is run the first time the device is connected to the internet.
        $params =  ['device_id','line','model_no','version','login','password'];
        $valid = validator($request->only($params), [
            'device_id' => 'required|string',
            'model_no' => 'required|string',
            'version' => 'required|string',
            'line' => 'required|numeric',
            'login' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);
    
        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return $jsonError;
        }
    
        if(Auth::attempt(['login' => $request->login, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $token =  $user->createToken('Adnatics')->accessToken; 
            return response()->json(['token' => $token], 200); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    

    public function UnitLogin(Request $request){
        
         $params =  ['device_id','login','password'];
         $valid = validator($request->only($params), [
             'device_id' => 'required|string',
             'login' => 'required|string|max:255',
             'password' => 'required|string|max:255'
         ]);
     
         if ($valid->fails()) {
             $jsonError=response()->json($valid->errors()->all(), 400);
             return $jsonError;
         }
     
         if(Auth::attempt(['login' => $request->login, 'password' => $request->password])){ 
             $user = Auth::user(); 
             $token =  $user->createToken('Adnatics')->accessToken; 
             return response()->json(['token' => $token], 200); 
         } 
         else{ 
             return response()->json(['error'=>'Unauthorised'], 401); 
         } 
     }
}
