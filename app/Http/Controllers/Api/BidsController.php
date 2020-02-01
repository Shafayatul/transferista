<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BidResource;

use App\Bid;
use App\User;
use App\Project;
use Auth;

class BidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $bids = Bid::where('transferista_id', Auth::id())->where('bid_status',0)->get();
        return BidResource::collection($bids);
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
            'amount' => 'required'
        ]);

        $bid                  = new Bid;
        $bid->project_id      = $request->id;
        $bid->transferista_id = Auth::id();
        $bid->amount          = $request->amount;
        $bid->save();

        return response()->json([
            'message' => 'Successfully bid submitted!'
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
        $bid = Bid::findOrFail($id);
        return response()->json([
            'bid' => $bid
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
        $bid                  = Bid::findOrFail($id);
        $bid->amount          = $request->amount;
        $bid->save();

        return response()->json([
            'message' => 'Successfully bid updated!'
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
        Bid::destroy($id);
        return response()->json([
            'message' => 'Successfully bid deleted!'
        ], 201);
    }
}
