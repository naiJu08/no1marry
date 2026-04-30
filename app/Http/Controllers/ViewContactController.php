<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewContact;
use App\Models\Member;
use Auth;

class ViewContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $viewed_contacts = ViewContact::where('viewed_by', Auth::user()->id)->latest()->paginate(10);
        return view('frontend.member.viewed_contacts', compact('viewed_contacts'));
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $userId = $request->id;
        $viewedBy = Auth::user()->id;

        // Check if already viewed
        $has_viewed = ViewContact::where('user_id', $userId)->where('viewed_by', $viewedBy)->exists();
        if ($has_viewed) {
            return response()->json([
                'status' => 'success',
                'message' => 'Already viewed',
                'remaining' => optional(Auth::user()->member)->remaining_contact_view
            ]);
        }

        $member = Member::where('user_id', $viewedBy)->first();
        if (!$member) {
             return response()->json([
                'status' => 'error',
                'message' => 'Member profile not found.'
            ]);
        }

        if ($member->remaining_contact_view <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No contact balance left. Please upgrade your package.'
            ]);
        }

        $view_contact             = new ViewContact;
        $view_contact->user_id    = $userId;
        $view_contact->viewed_by  = $viewedBy;
        if($view_contact->save()){
            $member->remaining_contact_view = max(0, $member->remaining_contact_view - 1);
            $member->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Contact unlocked successfully',
                'remaining' => $member->remaining_contact_view
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong approach admin'
            ]);
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
        //
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
