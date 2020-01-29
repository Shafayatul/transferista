<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Mail\employeeLoginInfo;
use Illuminate\Support\Str;
use App\Employee;
use App\User;
use Auth;
use Hash;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::where('company_id', Auth::id())->get();
        return response()->json([
            'employees' => $employees
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|string|email',
            'phone'      => 'required|string'
        ]);

        $password = Str::random(8);

        $user             = new User;
        $user->name       = $request->first_name.' '.$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($password);
        $user->status     = 1;
        $user->first      = 1;
        $user->save();

        if ($user) {
            $role = Role::findOrFail(5);
            $user->syncRoles([$role->name]);
        }

        $employee             = new Employee;
        $employee->user_id    = $user->id;
        $employee->company_id = Auth::id();
        $employee->first_name = $request->first_name;
        $employee->last_name  = $request->last_name;
        $employee->email      = $request->email;
        $employee->phone      = $request->phone;
        $employee->save();

        $email = $request->email;

        // Mail::to($email)->send(new employeeLoginInfo($email, $password));

        return response()->json([
            'message' => 'Successfully created Employee!'
        ], 201);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            'employee' => $employee
        ], 201);
    }

    public function update(Request $request)
    {
        
        $employee         = Employee::findOrFail($request->employee_id);

        $user             = User::findOrFail($employee->user_id);
        $user->name       = $request->first_name.' '.$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->save();

        $employee->company_id = Auth::id();
        $employee->first_name = $request->first_name;
        $employee->last_name  = $request->last_name;
        $employee->phone      = $request->phone;
        $employee->save();

        return response()->json([
            'message' => 'Successfully Updated Employee!'
        ], 201);
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json([
            'message' => 'Successfully Deleted Employee!'
        ], 201);
    }
}
