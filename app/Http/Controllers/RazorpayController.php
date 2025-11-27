<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use App\Order;
use App\Seller;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Input;
use App\CustomerPackage;
use App\SellerPackage;
use App\Http\Controllers\CustomerPackageController;
use Auth;

class RazorpayController extends Controller
{
    public function pay($request)
    {
        if(Session::has('payment_type')){
            if (Session::get('payment_type') == 'package_payment') {
                return view('frontend.payment_gateway.razorpay');
            }
        }
    }

    public function payment(Request $request)
    {
        //Input items of form
        $input = $request->all();
        //get API Configuration
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            $payment_detalis = null;
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payment_detalis = json_encode(array('id' => $response['id'],'method' => $response['method'],'amount' => $response['amount'],'currency' => $response['currency']));
            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            // Do something here for store payment details in database...
            if(Session::has('payment_type')){
                if (Session::get('payment_type') == 'package_payment') {
                    $packagePaymentController = new PackagePaymentController;
                    return $packagePaymentController->package_payment_done(Session::get('payment_data'), $payment_detalis);
                }
                elseif ($request->session()->get('payment_type') == 'wallet_payment') {
                  $walletController = new WalletController;
                  return $walletController->wallet_payment_done($request->session()->get('payment_data'), json_encode($payment_detalis));
                }
            }
        }
    }
}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Razorpay\Api\Api;
// use App\Models\ProfilePayment;
// use Session;
// use Auth;

// class RazorpayController extends Controller
// {
//     public function payment(Request $request)
//     {
//         // Validate the request
//         $request->validate([
//             'razorpay_payment_id' => 'required|string',
//             'profile_id' => 'required|integer',
//             'amount' => 'required|numeric',
//         ]);

//         $profile_id = $request->input('profile_id');
//         $amount = $request->input('amount');
//         $user_id = Auth::id();

//         $api = new Api('rzp_live_8nkalGgD1djptP', 'voBgDvRbd98r3WSbIlC9FQne');

//         try {
//             // Fetch the payment using the provided payment ID
//             $payment = $api->payment->fetch($request->razorpay_payment_id);

//             // Ensure the payment is authorized
//             if ($payment->status !== 'authorized') {
//                 Session::flash('error', 'Payment authorization failed!');
//                 return redirect()->back();
//             }

//             // Store the payment details immediately (before capture)
//             ProfilePayment::create([
//                 'user_id' => $user_id,
//                 'profile_id' => $profile_id,
//                 'payment_id' => $payment['id'],
//                 'amount' => $payment['amount'] / 100, // Convert to original amount
//                 'currency' => $payment['currency'],
//                 'payment_method' => $payment['method'],
//                 'status' => 'authorized', // Set as authorized
//             ]);

//             // Automatically capture the payment after storing payment details
//             $response = $payment->capture(['amount' => $payment['amount']]);

//             // After capture, update the status in the database
//             $paymentRecord = ProfilePayment::where('payment_id', $payment['id'])->first();
//             $paymentRecord->status = $response['status']; // Successful status after capture
//             $paymentRecord->save();

//             // Show success message and redirect
//             Session::flash('success', 'Payment successful!');
//             return redirect()->route('profile.payment.success', ['profile_id' => $profile_id]);

//         } catch (\Exception $e) {
//             // Handle any error (either while fetching or capturing payment)
//             Session::flash('error', $e->getMessage());
//             return redirect()->back();
//         }
//     }

//     public function paymentSuccess(Request $request)
//     {
//         // Validate Razorpay signature
//         $input = $request->all();
//         $razorpayOrderId = $input['razorpay_order_id'];
//         $razorpayPaymentId = $input['razorpay_payment_id'];
//         $razorpaySignature = $input['razorpay_signature'];

//         $api = new Api('rzp_live_8nkalGgD1djptP', 'voBgDvRbd98r3WSbIlC9FQne');

//         try {
//             // Verify the payment signature
//             $generatedSignature = $api->utility->verifyPaymentSignature($input);

//             if ($generatedSignature === $razorpaySignature) {
//                 // Payment is successful, store the details
//                 ProfilePayment::create([
//                     'user_id' => $input['user_id'], // Ensure user_id is passed with the request
//                     'profile_id' => $input['profile_id'], // Ensure profile_id is passed
//                     'payment_id' => $razorpayPaymentId,
//                     'amount' => $input['amount'],
//                     'currency' => 'INR',
//                     'payment_method' => 'razorpay',
//                     'status' => 'successful', // Mark as successful after verification
//                 ]);

//                 // Redirect to success page
//                 return redirect()->route('payment.success'); // Redirect to success page after payment success
//             } else {
//                 return redirect()->route('payment.failed')->with('error', 'Payment verification failed!');
//             }
//         } catch (\Exception $e) {
//             // Handle exception during verification
//             return redirect()->route('payment.failed')->with('error', 'Error in payment verification!');
//         }
//     }
// }
