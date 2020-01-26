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

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'Api\Auth\PasswordResetController@create');
    Route::get('find/{token}', 'Api\Auth\PasswordResetController@find');
    Route::post('reset', 'Api\Auth\PasswordResetController@reset');
});

Route:: post('/map',function (Request $request){
    // dd($request);
    $lat = $request->input('lat');
    $lng = $request->input('long'); 
    $location = ['lat'=>$lat,'lng'=>$lng];
    event(new SendPosition($location));
    return response()->json(['status'=>'success', 'data'=> $location]);
});

Route::get('project-list', 'Api\FrontendsController@index');
Route::get('project-detail/{id}', 'Api\FrontendsController@projectDetail');
Route::post('project-rating/{project_id}', 'Api\FrontendsController@projectRating');
Route::post('register', 'Api\UsersController@register');
Route::post('roles', 'Api\RolesController@store');
Route::post('login', 'Api\UsersController@login');
Route::group(['middleware' => ['auth:api']], function() {

    Route::post('password-update', 'Api\UsersController@passwordUpdate');
    Route::get('user-details', 'Api\UsersController@userDetails');
    Route::get('logout', 'Api\UsersController@logout');
    Route::post('user-info-save', 'Api\UsersController@userInfoSave');

    Route::group(['middleware' => ['role:company']], function () {
        Route::get('employees', 'Api\EmployeesController@index');
        Route::post('employees', 'Api\EmployeesController@store');
        Route::get('employees/{employee_id}', 'Api\EmployeesController@show');
        Route::post('employee-update', 'Api\EmployeesController@update');
        Route::delete('employees/{employee_id}', 'Api\EmployeesController@destroy');
    });

    
    Route::group(['middleware' => ['role:company|customer|employee']], function () {
        
        Route::get('messages/{conversation_id}', 'ChatsControler@fetchMessages');
        Route::post('messages', 'ChatsController@sendMessage');

        //Project Section
        Route::get('projects', 'Api\ProjectsController@index');
        Route::post('projects', 'Api\ProjectsController@store');
        Route::get('projects/{project_id}', 'Api\ProjectsController@show');
        Route::post('projects/{project_id}', 'Api\ProjectsController@update');
        Route::delete('projects/{project_id}', 'Api\ProjectsController@destroy');

        Route::get('project/accept/{project_id}/{transferista_id}', 'Api\ProjectsController@acceptProject');
        Route::get('project/transfer/{project_id}', 'Api\ProjectsController@transferProject');
        Route::get('payment/success', 'Api\PaymentsController@paymentSuccess');
    });

    Route::group(['middleware' => ['role:transferista']], function () {

        //Project
        Route::get('projects', 'Api\ProjectsController@index');
        Route::get('project/delivered/{project_id}', 'Api\ProjectsController@deliveredProject');

        //Bid Section
        Route::get('bids', 'Api\BidsController@index');
        Route::post('bids', 'Api\BidsController@store');
        Route::get('bids/{bid_id}', 'Api\BidsController@show');
        Route::post('bids/{bid_id}', 'Api\BidsController@update');
        Route::delete('bids/{bid_id}', 'Api\BidsController@destroy');

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

    Route::group(['middleware' => ['role:company|customer|employee|transferista']], function () {
        Route::post('ratings', 'Api\RatingsController@store');
    });

});
