<?php

namespace App\Http\Controllers\Api;

use Hash;
use App\User;
use Carbon\Carbon;
use App\UserInformation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email'      => 'required|string|email|unique:users',
            'password'   => 'required|string|confirmed',
            'last_name'  => 'required|string',
            'first_name' => 'required|string',
        ]);

        $user = new User([
            'status'     => 1,
            'first'      => 0,
            'email'      => $request->email,
            'last_name'  => $request->last_name,
            'first_name' => $request->first_name,
            'password'   => Hash::make($request->password),
            'name'       => $request->first_name.' '.$request->last_name,
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'remember_me' => 'boolean',
            'password'    => 'required|string',
            'email'       => 'required|string|email',
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'user'         => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ], 201);
    }

    public function userInfoSave(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'zip'     => 'required|string',
            'town'    => 'required|string',
            'country' => 'required|string',
        ]);

        $user_info                = new UserInformation;
        $user_info->user_id       = Auth::id();
        $user_info->address       = $request->address;
        $user_info->zip           = $request->zip;
        $user_info->town          = $request->town;
        $user_info->country       = $request->country;
        $user_info->company       = $request->company;
        $user_info->phone         = $request->phone;
        $user_info->email_company = $request->email_company;
        $user_info->vat           = $request->vat;
        $user_info->iban          = $request->iban;
        $user_info->bic           = $request->bic;
        $user_info->url           = $request->url;
        $user_info->paypal        = $request->paypal;
        $user_info->save();
        if($user_info){
            $role = Role::findOrFail($request->role_id);
            $user = Auth::user();
            $user->syncRoles([$role->name]);
        }
        

        return response()->json([
            'user'    => $user_info,
            'message' => 'Successfully Saved user Information!'
        ], 201);
    }
}
