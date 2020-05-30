<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function SocialSignup($provider){
        // Socialite will pick response data automatic 
        $authUser = Socialite::driver($provider)->stateless()->user();

        if($authUser->email != null){
            $user              = $this->findOrCreateUser($authUser, $provider);
  
            $user->roles()->sync(1);
            $tokenResult       = $user->createToken('Login via '.$provider);
            $token             = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
  
            $user->roles;
  
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'user' => $user,
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);          
        } else {
            return response()->json([
                'message' => 'You need to provide your email address for successful registrations.',
            ], 510);  
        }
    }


    private function findOrCreateUser($socialLiteUser, $provider){

        $user = User::where('email', $socialLiteUser->email)->first();
        if(!$user){
          $user = new User();
        
          $user->email = $socialLiteUser->email;
          $user->provider_id = $socialLiteUser->id;
          $user->provider_type = $provider;
          $user->name = $socialLiteUser->name;
          $user->provider_token = $socialLiteUser->token;
          $user->save();
          
        }

        return $user;
        
    }
}
