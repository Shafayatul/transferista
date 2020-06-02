<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Rate;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::where('status', 1)->latest()->paginate(25);
        return response()->json($rates);
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
        $rate                 = new Rate();
        $rate->currency       = $request->currency;
        $rate->currency_short = $request->currency_short;
        $rate->amount         = $request->amount;
        $rate->country        = $request->country;
        $rate->save();

        return response()->json([
            'msg' => 'Rate created',
            'rate' => $rate
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rate = Rate::findOrFail($id);
        return response()->json([
            'rate' => $rate
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
        $rate                 = Rate::findOrFail($id);
        $rate->currency       = $request->currency;
        $rate->currency_short = $request->currency_short;
        $rate->amount         = $request->amount;
        $rate->country        = $request->country;
        $rate->save();

        return response()->json([
            'msg' => 'Rate updated',
            'rate' => $rate
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rate::destroy($id);
        return response()->json([
            'msg' => 'Rate deleted'
        ]);
    }

    public function getCurrency($country){
        $rate = Rate::where('country', $country)->first();
        return response()->json([
            'rate' => $rate
        ]);
    }
}
