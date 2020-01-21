<?php

use Illuminate\Http\Request;

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
});
