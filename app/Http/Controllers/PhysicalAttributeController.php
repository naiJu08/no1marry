<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhysicalAttribute;
use Validator;
use Redirect;

class PhysicalAttributeController extends Controller
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
             'height'       => [ 'required','numeric'],
             'weight'       => [ 'required','numeric'],
             'disability'   => [ 'max:255'],
         ];
         $this->messages = [
             'height.required'      => translate('Height is required'),
             'height.numeric'       => translate('It should be numeric type'),
             'weight.required'      => translate('Weight is required'),
             'weight.numeric'       => translate('It should be numeric type'),
             'disability.max'       => translate('Max 255 characters'),

         ];

         $rules = $this->rules;
         $messages = $this->messages;
         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
             toastr()->error(translate('Something went wrong'));
             return Redirect::back()->withErrors($validator);
         }

         $physical_attribute = PhysicalAttribute::where('user_id', $id)->first();
         if(empty($physical_attribute)){
             $physical_attribute = new PhysicalAttribute;
             $physical_attribute->user_id = $id;
         }

         $physical_attribute->height        = $request->height;
         $physical_attribute->weight        = $request->weight;
         $physical_attribute->disability    = $request->disability;

         if($physical_attribute->save()){
             toastr()->success(translate('Physical Attribute Info has been updated successfully'));
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
