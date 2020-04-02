<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    protected $fillable = [ 
        'title' ,
            'impression_set' ,
            'location_lat' ,
            'location_long' ,
            'location_radius' ,
            'location_name' ,
            'channels.*' ,
            'target_gender' ,
            'duration' ,
            'target_emotions' ,
            'target_age' ,
            'scheduled_date' ,
            'stop_date' ,
            'time_schedule' ,
            'client_id',
            'cpc'
    ];
}
