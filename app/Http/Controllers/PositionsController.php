<?php

namespace App\Http\Controllers;
use  App\Events\Positions;
use  App\Events\GetLocation;
use  App\Events\SendEmail;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function sendPosition(Request $request){
        // \Log::debug($request);
        // $user_name = $user->name;
        $project_id = $request->input('project_id');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        broadcast(new Positions($project_id,$lat,$lng))->toOthers();
    }
    public function location(Request $request){
        \Log::debug($request);
        // $user_name = $user->name;
        $transferista_email = $request->input('transferista_email');
        $name = $request->input('name');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        broadcast(new GetLocation($transferista_email,$name,$lat,$lng))->toOthers();
    }
    public function sendMailAddress(Request $request){
        \Log::debug($request);
        // $user_name = $user->name;
        $email = $request->input('email');
        broadcast(new SendEmail($email))->toOthers();
    }
}
