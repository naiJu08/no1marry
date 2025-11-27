<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Validator;
use Redirect;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->rules = [
            'degree'          => [ 'required','max:255'],

        ];
    }

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

    public function create(Request $request)
    {
        $member_id = $request->id;
        return view('frontend.member.profile.education.create', compact('member_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->rules;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            toastr()->error(translate('Something went wrong'));
            return Redirect::back();
        }

        $education              = new Education;
        $education->user_id     = $request->user_id;
        $education->degree      = $request->degree;
        if($education->save()){
            toastr()->success(translate('Education Info has been added successfully'));
            return back();
        }
        else {
            toastr()->error(translate('Sorry! Something went wrong.'));
            return back();
        }
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

     public function edit(Request $request)
     {
         $education = Education::findOrFail($request->id);
         return view('frontend.member.profile.education.edit', compact('education'));
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
        $rules = $this->rules;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            toastr()->error(translate('Something went wrong'));
            return Redirect::back();
        }

        $education              = Education::findOrFail($id);
        $education->degree      = $request->degree;

        if($education->save()){
            toastr()->success(translate('Education Info has been updated successfully'));
            return back();
        }
        else {
            toastr()->error(translate('Sorry! Something went wrong.'));
            return back();
        }
    }

    public function update_education_present_status(Request $request)
    {
        $education = Education::findOrFail($request->id);
        $education->present = $request->status;
        if ($education->save()) {
            $msg = $education->present == 1 ? translate('Enabled') : translate('Disabled');
            toastr()->success(translate($msg));
            return 1;
        }
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Education::destroy($id))
        {
            toastr()->success(translate('Education info has been deleted successfully'));
            return back();
        }
        else {
            toastr()->error(translate('Sorry! Something went wrong.'));
            return back();
        }
    }
}
