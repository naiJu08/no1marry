<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OTPVerificationController;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Member;
use App\Models\Package;
use App\Models\Setting;
use App\Models\EmailTemplate;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Religion;
use App\Models\Caste;
use App\Models\SubCaste;
use App\Models\MemberLanguage;
use App\Models\FamilyValue;
use App\Models\MaritalStatus;
use App\Models\OnBehalf;
use App\Models\FamilyStatus;
use App\Models\Address;
use App\Models\SpiritualBackground;
use App\Models\PhysicalAttribute;
use App\Models\Career;
use App\Models\Education;
use App\Upload;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Mail\EmailManager;
use Notification;
use App\Notifications\DbStoreNotification;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegistrationForm()
    {
        $countries          = Country::where('status',1)->get();
      $states             = State::all();
      $cities             = City::all();
      $religions          = Religion::all();
      $castes             = Caste::all();
      $sub_castes         = SubCaste::all();
      $family_values      = FamilyValue::all();
      $marital_statuses   = MaritalStatus::all();
      $familyStatus   = FamilyStatus::all();
      $on_behalves        = OnBehalf::all();
      $languages          = MemberLanguage::all();
        return view('frontend.user_registration', compact('countries','states','cities','religions','castes','sub_castes','family_values','marital_statuses','on_behalves','languages','familyStatus'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'  => ['required', 'string', 'max:255'],
            'password'    => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $approval = get_setting('member_approval_by_admin') == 1 ? 0 : 1;
            $user = User::create([
                'first_name'  => $data['first_name'],
                'phone'       => $data['country_code'].$data['phone'],
                'password'    => Hash::make($data['password']),
                'code'        => unique_code(),
                'verification_code' => rand(100000, 999999)
            ]);
       
        $member                             = new Member;
        $member->user_id                    = $user->id;
        $member->save();
    
        
        $member->gender                     = $data['gender'];
        $package                            = Package::where('id',1)->first();
        $member->current_package_id         = $package->id;
        
        $member->save();
        

            $mobile= $user->phone;
            
            $msg='Dear Member, Your verification code is '.$user->verification_code.' .';



            $apiKey = urlencode('XMSJvQ9pdIk-YzfDVy2Ys80dEGsQKURB7VHcg3RKJm');
            // Message details
            $numbers = array($mobile);
            $sender = urlencode('NOONEM');
            $message = rawurlencode($msg);
        
            $numbers = implode(',', $numbers);
        
            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            // Process your response here
             $resp =json_decode($response,true);


        // Email to member
        // if($user->email != null  && env('MAIL_USERNAME') != null)
        // {
        //     $account_oppening_email = EmailTemplate::where('identifier','account_oppening_email')->first();
        //     if($account_oppening_email->status == 1)
        //     {
        //         EmailUtility::account_oppening_email($user->id, $data['password']);
        //     }
        // }

        return $user;

    }

    public function register(Request $request)
    {
        
            // if(User::where('email', $request->email)->first() != null){
            //     toastr()->error(translate('Email or Phone already exists.'));
            //     return back();
            // }
            if (User::where('phone', $request->country_code.$request->phone)->first() != null) {
            toastr()->error(translate('Phone already exists.'));
            return back();
            }
            

        $validator = Validator::make($request->all(), [
            'first_name'  => ['required', 'string', 'max:255'],
            'password'    => ['required', 'string', 'min:6'],

        ]);
        

        if ($validator->fails()){
            toastr()->error($validator);
            return redirect()->back();
        }
        $user = $this->create($request->all());

        if(get_setting('member_approval_by_admin') != 1 )
        {
          $this->guard()->login($user);
        }

        try{
            $notify_type = 'member_registration';
            $id = unique_notify_id();
            $notify_by = $user->id;
            $info_id = $user->id;
            $message = translate('A new member has been registered to your system. Name: ').$user->first_name.' '.$user->last_name;
            $route = 'members.index';

            Notification::send(User::where('user_type', 'admin')->first(), new DbStoreNotification($notify_type, $id, $notify_by, $info_id, $message, $route));
        }
        catch(\Exception $e){
            dd($e);
        }

        // if($user->email != null  && env('MAIL_USERNAME') != null && (get_email_template('account_opening_email_to_admin','status') == 1))
        // {
        //     $admin = User::where('user_type', 'admin')->first();
        //     EmailUtility::account_opening_email_to_admin($user, $admin);
        // }


        if($user->email != null){
            if(get_setting('email_verification') != 1){
                $user->email_verified_at = date('Y-m-d H:m:s');
                $user->save();
                toastr()->success(translate('Registration successfull.'));
                        }
            else {
                event(new Registered($user));
                toastr()->success(translate('Registration successfull. Please wite for the verification.'));
            }
        }

        return view('frontend.otp', compact('user'));
    }

    protected function registered(Request $request, $user)
    {
        if(get_setting('member_approval_by_admin') == 1 )
        {
          return redirect()->route('home');
        }
        else {
          return redirect()->route('dashboard');
        }
    }

    public function verify_otp(Request $request){
        // dd($request->all());
        $verification_code = $request->otp_number;
        $user = User::where(['id' => $request->user_id, 'verification_code' => $verification_code , 'phone' => $request->phone])->first();
        // dd($user);
        if($user != null){
            $user->approved = 1;
            $user->save();
                    // dd($user);

            Auth::login($user);
            
            return redirect()->route('dashboard');

        }

        toastr()->error(translate('OTP is incorrect please try agin.'));
         $user = User::where(['id' => $request->user_id])->first();
        return view('frontend.otp', compact('user'));
    }

    public function resent_otp(Request $request, $id){
        $user = User::where(['id' => $id])->first();

        if($user != null){
            $user->verification_code= rand(100000, 999999);
            $user->save();



            $mobile= $user->phone;
            
            $msg='Dear Member, Your verification code is '.$user->verification_code.' .';



            $apiKey = urlencode('XMSJvQ9pdIk-YzfDVy2Ys80dEGsQKURB7VHcg3RKJm');
            // Message details
            $numbers = array($mobile);
            $sender = urlencode('NOONEM');
            $message = rawurlencode($msg);
        
            $numbers = implode(',', $numbers);
        
            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            // Process your response here
             $resp =json_decode($response,true);


             toastr()->success(translate('OTP Resented successfull.'));
             return view('frontend.otp', compact('user'));
        }
    
    }
}
