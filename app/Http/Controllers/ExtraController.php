<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\DbStoreNotification;
use Notification;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use App\Http\Controllers\Controller;
use App\Models\Caste;
use App\Models\ExpressInterest;
use App\Models\Member;
use App\Models\ChatThread;
use App\Models\City;
use App\Models\SubCaste;
use App\User;
use Auth;
use DB;

class ExtraController extends Controller
{
    public function get_caste_by_religion(Request $request)
    {
        $caste = Caste::where('religion_id', $request->religion_id)->get();
        return $caste;
    }

    public function getCityByState(Request $request){
        $city = City::where('state_id', $request->state_id)->get();
        return $city;
    }
}
