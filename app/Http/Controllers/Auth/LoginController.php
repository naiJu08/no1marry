<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use App\User;
use Socialite;
use CoreComponentRepository;
use Illuminate\Support\Facades\Auth;

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

    // Removed legacy trait; implementing needed methods for Laravel 10

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            if($provider == 'twitter'){
                $user = Socialite::driver('twitter')->user();
            }
            else{
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            toastr()->error("Something Went wrong. Please try again.");
            return redirect()->route('user.login');
        }
        // check if they're an existing user
        $existingUser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {

            // create a new user
            $newUser                     = new User;
            $newUser->first_name         = $user->name;
            $newUser->email              = $user->email;
            $newUser->email_verified_at  = date('Y-m-d H:m:s');
            $newUser->provider_id        = $user->id;
            $newUser->code               = unique_code();
            $newUser->membership         = 1;
            $newUser->approved           = get_setting('member_approval_by_admin') == 1 ? 0 : 1;
            $newUser->save();

            $member                             = new Member;
            $member->user_id                    = $newUser->id;
            $member->gender                     = null;
            $member->on_behalves_id             = null;
            $member->birthday                   = null;

            $package                            = Package::where('id',1)->first();
            $member->current_package_id         = $package->id;
            $member->remaining_interest         = $package->express_interest;
            $member->remaining_contact_view     = $package->contact;
            $member->remaining_photo_gallery    = $package->photo_gallery;
            $member->auto_profile_match         = $package->auto_profile_match;
            $member->package_validity           = Date('Y-m-d', strtotime($package->validity." days"));
            $member->save();

            return redirect()->route('user.login');
            //auth()->login($newUser, true);
        }
        if(session('link') != null){
            return redirect(session('link'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        if(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){
           return $request->only($this->username(), 'password');
        }
        else {
            return ['phone'=>$request->get('country_code').$request->get('email'),'password'=>$request->get('password')];
        }

    }

    public function authenticated()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
        {
            return redirect()->route('admin.dashboard');
        }
        else {
            if(session('link') != null){
                return redirect(session('link'));
            }
            else{
                return redirect()->route('member.listing');
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

public function showLoginForm()
{
    if (auth()->check()) {
        if (auth()->user()->user_type == 'user') {
            return redirect()->route('member.listing');
        }
        return redirect()->route('admin.dashboard');
    }

    // Force the login page to not cache
    return response()
        ->view('frontend.user_login')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
}
   

    public function logout(Request $request)
    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')){
            $redirect_route = 'admin';
        }
        else{
            $redirect_route = 'base';
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route($redirect_route);
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($this->credentials($request), $request->boolean('remember'))) {
            $request->session()->regenerate();
            // Follow existing post-login redirection logic
            return $this->authenticated();
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Username field used for authentication.
     */
    public function username()
    {
        return 'email';
    }

    /**
     * The authentication guard for the application.
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Hook after logging out.
     */
    protected function loggedOut(Request $request)
    {
        return null;
    }
}
