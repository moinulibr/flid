<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\Login\RememberMeExpiration;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    use RememberMeExpiration;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $providers = [
        'google'
    ];

    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function desktop()
    {
        return view('desktop.indx');
    }
    public function show()
    {
        return view('backend-auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        // $user_cred = User::where('email', $request->email)->first();
        // if($user_cred != null){
        //     if($user_cred->email_verified_at == null){
        //         return redirect()->to('/email/verify');
        //     }
        // }
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if(
            (Auth::user()->status == 1) && (Auth::user()->deleted_at == NULL)
        )
        {
            if($request->get('remember')):
                $this->setRememberMeExpiration($user);
            endif;
    
            return $this->authenticated($request, $user);
        }
        $message  = "";
        if(Auth::user()->status == 0)
        {
            $message  = 'Your account is temporarily pending';
        } 
        else if(Auth::user()->status == 2)
        {
            $message  = 'Your account is inactive';
        }
        else if(Auth::user()->status == 3)
        {
            $message  = 'Your account is temporarily suspended';
        }else{
            $message  = 'Your account is permanently suspended';
        }
        Auth::logout();
        return redirect()->back()->with('success', $message);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->to('admin');
    }


    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

  
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('admin');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('social.login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => '',
                'user_role_id' => 2
            ]);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}
