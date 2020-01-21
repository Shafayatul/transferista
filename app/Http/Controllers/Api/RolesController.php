<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function store(Request $request)
    {
        Role::create([
            'guard_name' => 'api',
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'Successfully created Role!'
        ], 201);
    }
}
