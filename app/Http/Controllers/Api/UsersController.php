<?php

namespace App\Http\Controllers\Api;

use Hash;
use App\User;
use Carbon\Carbon;
use App\UserInformation;
use App\Rating;
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

    public function userDetails()
    {
        $user = Auth::user();
        $user_info = $user->userInfo;;

        $rating = Rating::where('rating_to', Auth::id())->with('ratingFrom')->get();
        $avg_rating = number_format((User::findOrFail(Auth::id())->ratingTo()->sum('rating'))/(count(User::findOrFail(Auth::id())->ratingTo) > 0 ? count(User::findOrFail(Auth::id())->ratingTo) : 1),2,'.','');

        return response()->json([
            'user' => $user,
            'user_info' => $user_info,
            'rating' => $rating,
            'avg_rating' => $avg_rating
        ]);

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
        $roles = $user->getRoleNames();
        $tokenResult = $user->createToken('Personal Access Token');
        
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
        return response()->json([
            'roles'        => $roles,
            'user'         => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   =>Carbon::parse($tokenResult->token->expires_at)->timestamp,
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
        \Log::debug($request);
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

    public function userInfoUpdate(Request $request)
    {
        $user             = User::findOrFail(Auth::id());
        $user->name       = $request->first_name.' '.$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->save();

        $user_info                = UserInformation::where('user_id', $user->id)->first();
        if($user_info){
            $user_info->address       = $request->user_info['address'];
            $user_info->zip           = $request->user_info['zip'];
            $user_info->town          = $request->user_info['town'];
            $user_info->country       = $request->user_info['country'];
            $user_info->company       = $request->user_info['company'];
            $user_info->phone         = $request->user_info['phone'];
            $user_info->email_company = $request->user_info['email_company'];
            $user_info->vat           = $request->user_info['vat'];
            $user_info->iban          = $request->user_info['iban'];
            $user_info->bic           = $request->user_info['bic'];
            $user_info->url           = $request->user_info['url'];
            $user_info->paypal        = $request->user_info['paypal'];
            $user_info->save();
        }
        return response()->json([
            'user'    => $user_info,
            'message' => 'Successfully Updated user Information!'
        ], 201);
    }

    public function currentUserEmail(Request $request){
        $email = Auth::user()->email;
        return response()->json([
            'email'    => $email
        ], 201);
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password'      => ['required', 'string', 'min:8'],
            'new_password'      => ['required', 'string', 'min:8'],
            'confirm_password'  => ['required', 'string', 'min:8'],
        ]);

        $old_password       = $request->old_password;
        $new_password       = $request->new_password;
        $confirm_password   = $request->confirm_password;

        if (Auth::check()) {
            if ($new_password == $confirm_password) {
                $current_password = Auth::user()->password;
                if (Hash::check($old_password, $current_password)) {
                    $id             = Auth::user()->id;
                    $user           = User::findOrFail($id);
                    $user->password = Hash::make($new_password);
                    $user->save();
                    // return redirect('/password-change')->with('success', 'Passowrd Updated!');
                    return response()->json([
                        'message' => 'Passowrd Updated!'
                    ], 201);
                } else {
                    return response()->json([
                        'message' => 'Old Password and Current password not matching!'
                    ]);
                }
            } else {
                // return redirect()->back()->with('error', 'New Password and Confirm password not matching!');
                return response()->json([
                    'message' => 'New Password and Confirm password not matching!'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Please login then submit request.'
            ]);
        }
    }

    public function transferistaDetails($id)
    {
        $user = User::findOrFail($id);
        $user->userInfo;
       $rating = Rating::where('rating_to', $id)->with('ratingFrom')->get();
       $avg_rating = number_format((User::findOrFail($id)->ratingTo()->sum('rating'))/(count(User::findOrFail($id)->ratingTo) > 0 ? count(User::findOrFail($id)->ratingTo) : 1),2,'.','') ;

        return response()->json([
            'user'=>$user,
            'rating' => $rating,
            'avg_rating' => $avg_rating
            // 'from_data' => $from_data,
        ]);
    }
}
