<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Project;

class FrontendsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return response()->json([
            'projects' => $projects
        ]);
    }
}
