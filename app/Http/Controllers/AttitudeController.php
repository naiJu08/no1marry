<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attitude;
use Validator;
use Redirect;

class AttitudeController extends Controller
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
             'affection' => [ 'max:255'],
             'humor'     => [ 'max:255'],
         ];
         $this->messages = [
             'affection.max'      => translate('Max 255 characters'),
             'humor.max'          => translate('Max 255 characters'),
         ];

         $rules = $this->rules;
         $messages = $this->messages;
         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
             toastr()->error(translate('Something went wrong'));
             return Redirect::back()->withErrors($validator);
         }

         $attitude = Attitude::where('user_id', $id)->first();
         if(empty($attitude)){
             $attitude = new Attitude;
             $attitude->user_id = $id;
         }

         $attitude->affection           = $request->affection;
         $attitude->humor               = $request->humor;
         $attitude->political_views     = $request->political_views;
         $attitude->religious_service   = $request->religious_service;

         if($attitude->save()){
             toastr()->success(translate('Personal Attitude and Behavior Info has been updated successfully'));
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
