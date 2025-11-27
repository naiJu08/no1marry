<?php

namespace App\Http\Controllers;
use App\Models\ProfilePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PublicProfileController extends Controller
{

public function showPaymentOrProfile(Request $request)
{
    $userId = auth()->id(); // Get the logged-in user ID
    $profileId = $request->input('profile_id', null); // Get the profile ID, default to null

    // Debugging the input data
    dd([
        'userId' => $userId,
        'profileId' => $profileId,
        'requestData' => $request->all(),
    ]);

    // Check if the payment exists
    $payment = ProfilePayment::where('user_id', $userId)
        ->where('profile_id', $profileId)
        ->first();

    // Debugging the payment result
    dd([
        'userId' => $userId,
        'profileId' => $profileId,
        'payment' => $payment,
    ]);

    return view('frontend.member.public_profile.index', [
        'payment' => $payment, // Pass payment (null if not found)
        'profileId' => $profileId, // Pass profile ID (can be null)
    ]);
}
}