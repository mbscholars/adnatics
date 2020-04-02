<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
/*  ===============================================================================         
                AUTHENTICATION
    * ============================================================================
    * THIS ROUTES CONTROL THE DEVICE AUTHENTICATION FOR THE ADVERT UNITS  
        
*/
Route::post('config', 'API\ConfigController@login');
Route::post('auth/unit', 'API\AuthController@createUnit');
Route::put('auth/unit', 'API\AuthController@UnitLogin');

/** ===================================AUTHENTICATION ENDED ================================================ */

/*  =========================================================================================================
*               ADVERT / CAMPAIGN CREATION ROUTES PROTECTED FOR LOGGED IN MEMBERS 
    ===============================================================================================================
*/

Route::post('ad/create', 'API\AdController@createUnit');