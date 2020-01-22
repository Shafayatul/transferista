<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return response()->json([
            'projects' => $projects
        ]);
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
        ]);

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
        $project->save();

        return response()->json([
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
        $project->save();

        return response()->json([
            'message' => 'Successfully updated project!'
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
