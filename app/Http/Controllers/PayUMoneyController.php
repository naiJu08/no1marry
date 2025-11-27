<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Session;
use Redirect;
use App\Http\Controllers\PackagePaymentController;
use Auth;

class PayUMoneyController extends Controller
{
    public function pay(Request $request)
    {
        // dd($request->all());
        $MERCHANT_KEY = "fB7m8s"; // TEST MERCHANT KEY
        $SALT = "eRis5Chv"; // TEST SALT
        // $MERCHANT_KEY = "dms7mgdy"; 
        // $SALT = "fW3H6bM2KA"; 

        $PAYU_BASE_URL = "https://test.payu.in";
        // $PAYU_BASE_URL = "https://secure.payu.in";

        //$PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
        $name = Auth::user()->first_name;
        $successURL = route('pay.u.response');
        $failURL = route('pay.u.cancel');
        $email = Auth::user()->email;
        $amount = $request->amount;

        $action = '';
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $posted = array();
        $posted = array(
            'key' => $MERCHANT_KEY,
            'txnid' => $txnid,
            'amount' => $amount,
            'firstname' => $name,
            'email' => $email,
            'productinfo' => 'Webappfix',
            'surl' => $successURL,
            'furl' => $failURL,
            'service_provider' => 'payu_paisa',
        );

        if(empty($posted['txnid'])) {
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        } 
        else{
            $txnid = $posted['txnid'];
        }

        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        
        if(empty($posted['hash']) && sizeof($posted) > 0) {
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';  
            foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;

            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        } 
        elseif(!empty($posted['hash'])) 
        {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
        }

        return view('payumoney.pay',compact('action','hash','MERCHANT_KEY','txnid','successURL','failURL','name','email','amount'));
    }

    public function payUResponse(Request $request)
    {
        try{
            $payment = ["status" => "Success"];
            if(Session::has('payment_type')){
              if (Session::get('payment_type') == 'package_payment') {
                  $packagePaymentController = new PackagePaymentController;
                  return $packagePaymentController->package_payment_done(session()->get('payment_data'), json_encode($payment));
              }
              elseif ($request->session()->get('payment_type') == 'wallet_payment') {
                $walletController = new WalletController;
                return $walletController->wallet_payment_done($request->session()->get('payment_data'), json_encode($payment));
              }
            }
        }
        catch (\Exception $e) {
            toastr()->error(translate('Payment failed'));
    	    return redirect()->route('home');
        }
    }

    public function payUCancel(Request $request)
    {
        toastr()->error(translate('Payment is cancelled'));
        return redirect()->route('packages');
    }
}
