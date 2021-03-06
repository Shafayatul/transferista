<?php

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
Route::post('payment/success', 'Api\PaymentsController@paymentSuccess');
Route::get('transferista-details/{id}', 'Api\UsersController@transferistaDetails');
Route::get('get-currency/{country}', 'Api\RatesController@getCurrency');

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'Api\Auth\PasswordResetController@create');
    Route::get('find/{token}', 'Api\Auth\PasswordResetController@find');
    Route::post('reset', 'Api\Auth\PasswordResetController@reset');
});

// Route:: post('/map',function (Request $request){
//     // dd($request);
//     $lat = $request->input('lat');
//     $lng = $request->input('long'); 
//     $location = ['lat'=>$lat,'lng'=>$lng];
//     event(new SendPosition($location));
//     return response()->json(['status'=>'success', 'data'=> $location]);
// });

Route::get('project-list/{status}', 'Api\FrontendsController@index');
Route::get('visitor-project-detail/{id}', 'Api\FrontendsController@visitorProjectDetail');
Route::post('project-rating/{project_id}', 'Api\FrontendsController@projectRating');
Route::post('register', 'Api\UsersController@register');
Route::post('roles', 'Api\RolesController@store');
Route::post('login', 'Api\UsersController@login');
Route::group(['middleware' => ['auth:api']], function() {

    Route::get('current-user-email', 'Api\UsersController@currentUserEmail');
    Route::post('send-email', 'PositionsController@sendMailAddress');

    Route::post('password-update', 'Api\UsersController@passwordUpdate');
    Route::get('user-details', 'Api\UsersController@userDetails');
    Route::get('logout', 'Api\UsersController@logout');
    Route::post('user-info-save', 'Api\UsersController@userInfoSave');
    Route::post('user-info-update', 'Api\UsersController@userInfoUpdate');

    Route::get('project-detail/{id}', 'Api\FrontendsController@projectDetail');

    Route::group(['middleware' => ['role:company']], function () {
        Route::get('employees', 'Api\EmployeesController@index');
        Route::post('employees', 'Api\EmployeesController@store');
        Route::get('employees/{employee_id}', 'Api\EmployeesController@show');
        Route::post('employee-update', 'Api\EmployeesController@update');
        Route::delete('employees/{employee_id}', 'Api\EmployeesController@destroy');
    });

    
    Route::group(['middleware' => ['role:company|customer|employee|driver']], function () {
        Route::post('projects', 'Api\ProjectsController@store');
        Route::get('projects/{project_id}', 'Api\ProjectsController@show');
        Route::post('projects/{project_id}', 'Api\ProjectsController@update');
        Route::delete('projects/{project_id}', 'Api\ProjectsController@destroy');

        Route::get('project/accept/{project_id}/{transferista_id}', 'Api\ProjectsController@acceptProject');
        Route::get('project/transfer/{project_id}', 'Api\ProjectsController@transferProject');
        // Route::post('payment/success', 'Api\PaymentsController@paymentSuccess');
    });
    // Route::group(['middleware' => ['role:employee|driver']], function () {
    //     Route::post('position', 'PositionsController@sendPosition');
    // });
    Route::group(['middleware' => ['role:transferista|driver']], function () {
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

        Route::post('assign-driver-to-project', 'Api\ProjectsController@assignDriverToProject');
        Route::get('assign-driver-to-project', 'Api\ProjectsController@getAssignDriverToProject');
        Route::post('assign-driver-to-project/{id}', 'Api\ProjectsController@updateAssignDriverToProject');
    });

    Route::group(['middleware' => ['role:company|customer|employee|transferista|driver']], function () {
        Route::post('ratings', 'Api\RatingsController@store');
        Route::get('projects', 'Api\ProjectsController@index');
        Route::get('transferista-details-by-project-status', 'Api\ProjectsController@transferistaDetails');
    });

    Route::group(['middleware' => ['role:transferista|driver']], function () {
        Route::get('driver-projects', 'Api\DriversController@driverProjects');
    });

    // Route::group(['middleware' => ['role:company|customer|transferista']], function () {
        
    //     Route::get('messages/{conversation_id}', 'ChatsController@fetchMessages');
    //     Route::post('messages', 'ChatsController@sendMessage');
    // });
    Route::get('transferista','Api\DriversController@email');
    Route::post('position', 'PositionsController@sendPosition');
    Route::post('send-position', 'PositionsController@location');

    //Rate
    Route::get('rates', 'Api\RatesController@index');
    Route::post('rates', 'Api\RatesController@store');
    Route::get('rates/{id}', 'Api\RatesController@show');
    Route::post('rates/{id}', 'Api\RatesController@update');
    Route::delete('rates/{id}', 'Api\RatesController@destroy');
});
