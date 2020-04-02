<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\campaign;

class AdController extends Controller
{
    protected $user;
    public function __construct(){
        $this->middleware('auth:api');
        $this->user = auth()->guard('api')->user();
        return response($this->user);
    }
    public function createUnit(Request $request){
        $params =  ['title','file','impression_set','location_lat','location_long','location_radius','location_name','channels','target_gender','duration', 'target_emotions','target_age','scheduled_date','stop_date','time_schedule'];
        $valid = validator($request->only($params), [
            'title' => 'required|string',
           // 'file' => 'required|mimes:jpeg,jpg,3gp,mp4,avi,gif',
            'impression_set' => 'required|integer|gt:0',
            'location_lat' => 'required|string',
            'location_long' => 'required|string',
            'location_radius' => 'nullable|numeric',
            'location_name' => 'nullable|string',
            'channels.*' => 'required|string' ,
            'target_gender' => 'nullable|string|in:male,female,0',
            'duration' => 'required|integer', 
            'target_emotions' => 'required|string',
            'target_age' => 'required|integer',
            'scheduled_date' => 'required|string',
            'stop_date' => 'required|string|date',
            'time_schedule' => 'required|string'
        ]);
        if($valid->fails()){
            return response()->json(['status' => 'false', 'errors' => $valid->errors()->all()]);
        }
        //confirm that user can create ad units
       // if(!$this->user->can('create-ad', $this->user)){
          //  return response()->json(['status' => 'false', 'message' => 'Action Not Allowed!']);
      //  }

        $doCreate = $this->_createUnit($request);
        return response()->json($doCreate);
    
    }
    private function _createUnit(Request $request){
   
        $campaign = campaign::create([
            'title' => $request-> title,
            'impression_set' => $request->impression_set,
            'location' => json_encode ( ['lat' => $request-> location_lat, 'long' => $request->location_long]),
            'location-radius' => $request->location_radius,
            'location-name' => $request->location_name,
            'channels.*' => json_encode($request->channels),
            'target-gender' => $request->target_gender,
            'duration' => $request->duration,
            'target-emotions' => $request->target_emotions,
            'target-age' => $request->target_age,
            'scheduled_date' => $request->scheduled_date,
            'stop-date' => $request->stop_date,
            'time-schedule' => $request->time_schedule,
            'client_id' => $this->user->id,
            'cpc' => $this->generateCPC()
        ]);

        return response($campaign);
    }
    private function generateCPC(){
        return 1.7;
    }
    public function editUnit(Request $request){
        // $params = [''];
        $valid = validator($request->only($params), [

        ]);

    }
    public function reSchedule(){


    }
    public function delete(){
        //only admins

    }
    public function service(){
        //function to serve adverts
    }
    public function download(){

    }
    public function uploadMedia(){

    }

}
