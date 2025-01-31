<?php

namespace App\Http\Controllers\RootAdmin;

use App\Models\Inquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', ['inquiries' => $inquiries]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', ['inquiry' => $inquiry]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->back()->with('message', 'Inquiry deleted successfully!');
    }
}
