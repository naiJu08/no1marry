<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Auth;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $complaint = new Complaint();
        $complaint->user_id = Auth::check() ? Auth::id() : null;
        $complaint->name = $request->name;
        $complaint->email = $request->email;
        $complaint->subject = $request->subject;
        $complaint->message = $request->message;
        $complaint->status = 'pending';
        $complaint->save();

        toastr()->success('Your complaint has been submitted successfully.');

        return redirect()->route('dashboard');
    }

    public function index()
    {
        $complaints = Complaint::latest()->paginate(20);

        return view('admin.complaints.index', compact('complaints'));
    }
}
