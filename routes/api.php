<?php

use Illuminate\Http\Request;
use App\Events\SendPosition;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route:: post('/map',function (Request $request){
    // dd($request);
    $lat = $request->input('lat');
    $lng = $request->input('long'); 
    $location = ['lat'=>$lat,'lng'=>$lng];
    event(new SendPosition($location));
    return response()->json(['status'=>'success', 'data'=> $location]);
});
