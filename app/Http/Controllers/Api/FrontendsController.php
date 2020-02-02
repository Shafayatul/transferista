<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Project;
use App\Bid;
use Auth;

class FrontendsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return ProjectResource::collection($projects);
    }

    public function projectDetail($id)
    {
        $user_id = Auth::id();
        $project = Project::findOrFail($id);
        $project_owner_id = $project->project_owner_id;
        if($user_id == $project_owner_id){
            $is_owner = true;
        }else{
            $is_owner = false;
        }
        $project = new ProjectResource($project);
        $bids = Bid::where('project_id', $id)->get();

        $bids_data_array = [];
        foreach($bids as $bid){
            $single_data_arr = [];
            $single_data_arr['bid_id'] = $bid->id;
            $single_data_arr['bid_transferista_id'] = $bid->transferista_id;
            $single_data_arr['bid_transferista_vat'] = $bid->user->vat;
            $single_data_arr['bid_project_id'] = $bid->project_id;
            $single_data_arr['bid_amount'] = $bid->amount;
            $single_data_arr['bid_transferista_name'] = $bid->user->name;
            $single_data_arr['bid_status'] = $bid->bid_status;
            array_push($bids_data_array, $single_data_arr);
        };
        return response()->json([
            'project' => $project,
            'bids_data_array' => $bids_data_array,
            'is_owner'=> $is_owner
        ]);
    }

    public function visitorProjectDetail($id)
    {
        $project = Project::findOrFail($id);
        $project_owner_id = $project->project_owner_id;
        $is_owner = false;
        $project = new ProjectResource($project);
        $bids = Bid::where('project_id', $id)->get();

        $bids_data_array = [];
        foreach($bids as $bid){
            $single_data_arr = [];
            $single_data_arr['bid_id'] = $bid->id;
            $single_data_arr['bid_transferista_id'] = $bid->transferista_id;
            $single_data_arr['bid_transferista_vat'] = $bid->user->vat;
            $single_data_arr['bid_project_id'] = $bid->project_id;
            $single_data_arr['bid_amount'] = $bid->amount;
            $single_data_arr['bid_transferista_name'] = $bid->user->name;
            $single_data_arr['bid_status'] = $bid->bid_status;
            array_push($bids_data_array, $single_data_arr);
        };
        return response()->json([
            'project' => $project,
            'bids_data_array' => $bids_data_array,
            'is_owner'=> $is_owner
        ]);
    }

    public function position(){
        
    }
}
