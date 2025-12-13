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
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        $complaint = new Complaint();
        $complaint->user_id = Auth::check() ? Auth::id() : null;
        $complaint->name = $request->name;
        $complaint->email = $request->email;
        $complaint->subject = $request->subject;
        $message = $request->message;

        if ($request->filled('phone')) {
            $message .= "\n\nPhone: " . $request->phone;
        }

        if ($request->filled('address')) {
            $message .= "\nAddress: " . $request->address;
        }

        $complaint->message = $message;
        $complaint->status = 'pending';
        $complaint->save();

        toastr()->success('Your complaint has been submitted successfully.');

        return redirect()->route('dashboard');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,resolved',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->status;
        $complaint->save();

        toastr()->success('Complaint status updated successfully.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        toastr()->success('Complaint deleted successfully.');

        return redirect()->back();
    }

    public function index()
    {
        $complaints = Complaint::latest()->paginate(20);

        return view('admin.complaints.index', compact('complaints'));
    }
}
