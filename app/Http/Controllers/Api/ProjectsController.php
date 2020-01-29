<?php

namespace App\Http\Controllers\Api;


use Auth;
use App\Bid;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use App\Http\Resources\ProjectResource;

class ProjectsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('company')) {
            $projects = Project::where('project_owner_id', Auth::id())->latest()->get();
        }elseif ($user->hasRole('customer')) {
            $projects = Project::where('project_owner_id', Auth::id())->latest()->get();
        }elseif ($user->hasRole('transferista')) {
            $projects = Project::where('transferista_id', Auth::id())->latest()->get();
        }else {
            $projects = Project::latest()->get();
        }
        
        return ProjectResource::collection($projects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_address'      => 'required|string',
            'origin_zip'          => 'required|string',
            'origin_town'         => 'required|string',
            'origin_country'      => 'required|string',
            'origin_lng'          => 'required|string',
            'origin_lat'          => 'required|string',
            'destination_address' => 'required|string',
            'destination_zip'     => 'required|string',
            'destination_town'    => 'required|string',
            'destination_country' => 'required|string',
            'destination_lng'     => 'required|string',
            'destination_lat'     => 'required|string',
            'project_title'       => 'required|string',
            'project_description' => 'required',
            'project_size'        => 'required',
            'delivery_date'       => 'required',
            'time_for_delivery'   => 'required',
            'distance'            => 'required',
        ]);

        $estimated_cost = (float)$request->distance*1.5+(float)$request->project_size;

        $project                      = new Project;
        $project->project_owner_id    = Auth::id();
        $project->origin_address      = $request->origin_address;
        $project->origin_zip          = $request->origin_zip;
        $project->origin_town         = $request->origin_town;
        $project->origin_country      = $request->origin_country;
        $project->origin_lng          = $request->origin_lng;
        $project->origin_lat          = $request->origin_lat;
        $project->destination_address = $request->destination_address;
        $project->destination_zip     = $request->destination_zip;
        $project->destination_town    = $request->destination_town;
        $project->destination_country = $request->destination_country;
        $project->destination_lng     = $request->destination_lng;
        $project->destination_lat     = $request->destination_lat;
        $project->project_title       = $request->project_title;
        $project->project_description = $request->project_description;
        $project->project_size        = $request->project_size;
        $project->delivery_date       = $request->delivery_date;
        $project->time_for_delivery   = $request->time_for_delivery;
        $project->estimated_cost      = $estimated_cost;
        $project->save();

        return response()->json([
            'estimated_cost' => $estimated_cost,
            'message' => 'Successfully created project!'
        ], 201);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json([
            'project' => $project
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

        $estimated_cost = (float) $request->distance * 1.5 + (float) $request->project_size;

        $project                      = Project::findOrFail($id);
        $project->project_owner_id    = Auth::id();
        $project->origin_address      = $request->origin_address;
        $project->origin_zip          = $request->origin_zip;
        $project->origin_town         = $request->origin_town;
        $project->origin_country      = $request->origin_country;
        $project->origin_lng          = $request->origin_lng;
        $project->origin_lat          = $request->origin_lat;
        $project->destination_address = $request->destination_address;
        $project->destination_zip     = $request->destination_zip;
        $project->destination_town    = $request->destination_town;
        $project->destination_country = $request->destination_country;
        $project->destination_lng     = $request->destination_lng;
        $project->destination_lat     = $request->destination_lat;
        $project->project_title       = $request->project_title;
        $project->project_description = $request->project_description;
        $project->project_size        = $request->project_size;
        $project->delivery_date       = $request->delivery_date;
        $project->time_for_delivery   = $request->time_for_delivery;
        $project->estimated_cost      = $estimated_cost;
        $project->save();

        return response()->json([
            'message' => 'Successfully updated project!'
        ], 201);
    }

    public function acceptProject($project_id, $transferista_id)
    {
        $bid = Bid::where(['project_id' => $project_id, 'transferista_id' => $transferista_id])->first();
        if ($bid) {
            $bid->bid_status = 1;
            $bid->save();

            $transferista             = User::findOrFail($transferista_id);
            $vat                      = $transferista->userInfo->vat;
            $vat_amount               = ($vat/100)* $bid->amount;
            $net_amount               = $bid->amount + $vat_amount;
            
            $project                  = Project::findOrFail($project_id);
            $project->transferista_id = $bid->transferista_id;
            $project->project_amount  = $net_amount;
            $project->project_status  = 1;
            $project->save();

            return response()->json([
                'message' => 'Successfully bid accepted!'
            ], 201);
        }else {
            return response()->json([
                'message' => 'Bid not accepted!'
            ], 201);
        }
        
    }

    public function transferProject($project_id)
    {
        $project                 = Project::findOrFail($project_id);
        $project->project_status = 2;
        $project->save();
        return response()->json([
            'message' => 'Project transfer..!'
        ], 201);
    }

    public function deliveredProject($project_id)
    {
        $project                 = Project::findOrFail($project_id);
        $project->project_status = 3;
        $project->save();
        return response()->json([
            'message' => 'Project delivered..!'
        ], 201);
    }

    public function destroy($id)
    {
        $project                 = Project::findOrFail($id);
        $project->project_status = 4;
        $project->save();
        Project::destroy($id);
        return response()->json([
            'message' => 'Successfully deleted project!'
        ], 201);
    }
}
