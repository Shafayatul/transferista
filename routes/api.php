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

Route::get('project-list', 'Api\FrontendsController@index');
Route::post('register', 'Api\UsersController@register');
Route::post('roles', 'Api\RolesController@store');
Route::post('login', 'Api\UsersController@login');
Route::group(['middleware' => ['auth:api']], function() {

    Route::get('logout', 'Api\UsersController@logout');
    Route::post('user-info-save', 'Api\UsersController@userInfoSave');

    Route::group(['middleware' => ['role:Company']], function () {
        Route::get('employees', 'Api\EmployeesController@index');
        Route::post('employees', 'Api\EmployeesController@store');
        Route::get('employees/{employee_id}', 'Api\EmployeesController@show');
        Route::post('employee-update', 'Api\EmployeesController@update');
        Route::delete('employees/{employee_id}', 'Api\EmployeesController@destroy');
    });

    
    Route::group(['middleware' => ['role:Company|Customer']], function () {

        //Project Section
        Route::get('projects', 'Api\ProjectsController@index');
        Route::post('projects', 'Api\ProjectsController@store');
        Route::get('projects/{project_id}', 'Api\ProjectsController@show');
        Route::post('projects/{project_id}', 'Api\ProjectsController@update');
        Route::delete('projects/{project_id}', 'Api\ProjectsController@destroy');
    });

    Route::group(['middleware' => ['role:Transferista']], function () {

        //Bid Section
        Route::post('bids', 'Api\BidsController@store');

        //Driver Section
        Route::get('drivers', 'Api\DriversController@index');
        Route::post('drivers', 'Api\DriversController@store');
        Route::get('drivers/{driver_id}', 'Api\DriversController@show');
        Route::post('drivers/{driver_id}', 'Api\DriversController@update');
        Route::delete('drivers/{driver_id}', 'Api\DriversController@destroy');

        //Car Section
        Route::get('cars', 'Api\CarsController@index');
        Route::post('cars', 'Api\CarsController@store');
        Route::get('cars/{car_id}', 'Api\CarsController@show');
        Route::post('cars/{car_id}', 'Api\CarsController@update');
        Route::delete('cars/{car_id}', 'Api\CarsController@destroy');
    });


});
