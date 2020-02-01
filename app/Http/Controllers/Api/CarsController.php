<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Car;
use Auth;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('transferista_id', Auth::id())->where('car_status', 1)->get();
        return response()->json([
            'cars' => $cars
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
            'brand' => 'required|string',
            'type'  => 'required|string',
            'plate' => 'required|string',
        ]);

        $car                  = new Car;
        $car->transferista_id = Auth::id();
        $car->brand           = $request->brand;
        $car->type            = $request->type;
        $car->plate           = $request->plate;
        $car->cargo_capacity           = $request->cargo_capacity;
        $car->save();
        return response()->json([
            'car' => $car
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
        $car = Car::findOrFail($id);
        return response()->json([
            'car' => $car
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
        $car                  = Car::findOrFail($id);
        $car->transferista_id = Auth::id();
        $car->brand           = $request->brand;
        $car->type            = $request->type;
        $car->plate           = $request->plate;
        $car->cargo_capacity  = $request->cargo_capacity;
        $car->save();
        return response()->json([
            'car' => $car
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
        $car = Car::findOrFail($id);
        $car->car_status = 0;
        $car->save();
        Car::destroy($id);
        return response()->json([
            'message' => 'Successfully deleted car!'
        ], 201);
    }
}
