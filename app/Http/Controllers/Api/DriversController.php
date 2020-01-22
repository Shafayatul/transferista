<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Driver;
use App\User;
use Auth;
use Hash;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::where('transferista_id', Auth::id())->where('driver_status', 1)->get();
        return response()->json([
            'drivers' => $drivers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|string|email',
            'phone'      => 'required|string'
        ]);

        $password = Str::random(8);

        $user             = new User;
        $user->name       = $request->first_name . ' ' . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($password);
        $user->first      = 1;
        $user->save();

        $driver                  = new Driver;
        $driver->transferista_id = Auth::id();
        $driver->user_id         = $user->id;
        $driver->phone           = $request->phone;
        $driver->save();

        return response()->json([
            'message' => 'Successfully created driver!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return response()->json([
            'driver' => $driver
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver           = Driver::findOrFail($id);

        $user             = User::findOrFail($driver->user_id);
        $user->name       = $request->first_name . ' ' . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->save();

        $driver->transferista_id = Auth::id();
        $driver->phone           = $request->phone;
        $driver->save();

        return response()->json([
            'message' => 'Successfully Updated Driver!'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver                = Driver::findOrFail($id);
        $driver->driver_status = 0;
        $driver->save();

        Driver::destroy($id);
        return response()->json([
            'message' => 'Successfully Deleted Driver!'
        ], 201);
    }
}