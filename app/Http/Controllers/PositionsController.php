<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function sendPosition(Request $request){
        $user=Auth::user();
        $user_name = $user->name;
        $transferista_id = $request->input('transferista_id');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        broadcast(new Positions($user_name,$transferista_id,$lat,$lng))->toOthers();
    }
}
