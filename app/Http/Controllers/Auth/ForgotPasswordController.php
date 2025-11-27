<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Http;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

    public function sendResetLinkEmail(Request $request)
    {
        
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();

                EmailUtility::password_reset_email($user, $user->verification_code);
                return view('auth.passwords.reset');
            }
            else {
                toastr()->error(translate('No account exists with this email'));
                return back();
            }
        }
        // else{
        //     $user = User::where('phone', $request->country_code.$request->email)->first();
        //     if ($user != null) {
        //         $user->verification_code = rand(100000,999999);
        //         $user->save();


        //     $mobile= $request->country_code.$request->email;
            
        //     $msg='Dear Member, Your verification code is '.$user->verification_code.' .';



        //     $apiKey = urlencode('XMSJvQ9pdIk-YzfDVy2Ys80dEGsQKURB7VHcg3RKJm');
        //     // Message details
        //     $numbers = array($mobile);
        //     $sender = urlencode('NOONEM');
        //     $message = rawurlencode($msg);
        
        //     $numbers = implode(',', $numbers);
        
        //     // Prepare data for POST request
        //     $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        
        //     // Send the POST request with cURL
        //     $ch = curl_init('https://api.textlocal.in/send/');
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     $response = curl_exec($ch);
        //     curl_close($ch);
            
        //     // Process your response here
        //      $resp =json_decode($response,true);
                

        //         EmailUtility::password_reset_email($user, $user->verification_code);
        //         return view('auth.passwords.reset', compact('user'));
        //     }
        //     else {
        //         toastr()->error(translate('No account exists with this phone number'));
        //         return back();
        //     }
        else {
        $user = User::where('phone', $request->country_code . $request->email)->first();
        if ($user != null) {
            $user->verification_code = rand(100000, 999999);
            $user->save();

            $mobile = $request->email;
            $otp = $user->verification_code;

            // // Fast2SMS API Integration using cURL
            // $apiKey = 'FlUCO9iOxUgQrNAi7j2hQNMUIZA4YC7id7xaFbtsQhCYf5CHe5iOcHzghGNE';
            // $flash = 0;

            // $data = [
            //     'authorization' => $apiKey,
            //     'route' => 'otp',
            //     'variables_values' => $otp,
            //     'numbers' => $mobile,
            //     'flash' => $flash
            // ];

            // $ch = curl_init('https://www.fast2sms.com/dev/bulkV2');
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //     "cache-control: no-cache",
            //     "Content-Type: application/x-www-form-urlencoded",
            //     'Accept' => 'application/json'
            // ]);

            // $response = curl_exec($ch);
            // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // curl_close($ch);
            
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->get('https://www.fast2sms.com/dev/bulkV2', [
                'authorization' => urlencode('FlUCO9iOxUgQrNAi7j2hQNMUIZA4YC7id7xaFbtsQhCYf5CHe5iOcHzghGNE'),
                'route' => 'otp',
                'variables_values' => $otp,
                'numbers' => $mobile,
                'flash' => '0'
            ]);
            $statusCode = $response->status(); 


            // Log the API response
            \Log::info('Fast2SMS Response: ', ['response' => $response]);

            // Process response
            $resp = json_decode($response, true);
            if ($statusCode == 200 && isset($resp['return']) && $resp['return'] == true) {
                EmailUtility::password_reset_email($user, $otp);
                return view('auth.passwords.reset', compact('user'));
            } else {
                toastr()->error(translate('Failed to send OTP. API Response: ' . json_encode($resp)));
                return back();
            }
        } else {
            toastr()->error(translate('No account exists with this phone number'));
            return back();
        }
        }
    }
}
