<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerExpectation;
use App\Models\Member;
use App\Models\PhysicalAttribute;
use App\Models\SpiritualBackground;
use App\Mail\SecondEmailVerifyMailManager;
use App\Models\Education;
use App\Models\Career;
use App\Models\Address;
use App\Models\Lifestyle;
use App\Models\HappyStory;
use App\Models\IgnoredUser;
use App\Models\ProfileMatch;
use App\User;
use Auth;
use Validator;
use Redirect;

class PartnerExpectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
         $this->rules = [
             'general'                      => [ 'max:255'],
             'partner_height'               => [ 'max:50'],
             'partner_weight'               => [ 'max:50'],
             'partner_children_acceptable'  => [ 'max:20'],
             'pertner_education'            => [ 'max:255'],
             'partner_profession'           => [ 'max:50'],
         ];
         $this->messages = [
             'general.max'                      => translate('Max 255 characters'),
             'partner_height.max'               => translate('Max 50 characters'),
             'partner_weight.max'               => translate('Max 50 characters'),
             'partner_children_acceptable.max'  => translate('Max 20 characters'),
             'pertner_education.max'            => translate('Max 255 characters'),
             'partner_profession.max'           => translate('Max 50 characters'),
         ];

         $rules = $this->rules;
         $messages = $this->messages;
         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
             toastr()->error(translate('Something went wrong'));
             return Redirect::back()->withErrors($validator);
         }

         $user                 = User::where('id',$id)->first();
         $partner_expectations = PartnerExpectation::where('user_id', $id)->first();
         if(empty($partner_expectations)){
             $partner_expectations           = new PartnerExpectation;
             $partner_expectations->user_id  = $id;
         }

         $partner_expectations->general                   = $request->general;
         $partner_expectations->height                    = $request->partner_height;
         $partner_expectations->weight                    = $request->partner_weight;
         $partner_expectations->marital_status_id         = $request->partner_marital_status;
         $partner_expectations->children_acceptable       = $request->partner_children_acceptable;
         $partner_expectations->residence_country_id      = $request->residence_country_id;
         $partner_expectations->religion_id               = $request->partner_religion_id;
         $partner_expectations->caste_id                  = $request->partner_caste_id;
         $partner_expectations->sub_caste_id              = $request->partner_sub_caste_id;
         $partner_expectations->education                 = $request->pertner_education;
         $partner_expectations->profession                = $request->partner_profession;
         $partner_expectations->preferred_country_id      = $request->partner_country_id;
         $partner_expectations->preferred_state_id        = $request->partner_state_id;

          if($partner_expectations->save()){
            if($user->member->auto_profile_match ==  1){
              $ProfileMatchController = new ProfileMatchController;
              $ProfileMatchController->match_profiles($user->id);
            }
            toastr()->success(translate('Partner Expectations Info has been updated successfully'));
            return back();
          }
          else {
            toastr()->error(translate('Sorry! Something went wrong.'));
            return back();
          }

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
