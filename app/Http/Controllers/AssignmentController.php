<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Learner;
use App\Models\School;
use Auth;

class AssignmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "pdf" => "required|mimes:pdf|max:10000",
            "late_submission" => "required|date"
        ]);
        
        $uploadedFile = $request->file('pdf');
        $filename = time().$uploadedFile->getClientOriginalName();

        $thefile = Storage::disk('public')->putFileAs(
            'assigments/'.$filename,
            $uploadedFile,
            $filename
        );
       
        $success = Assignment::create([
            'lecture_id' => $request->lecture_id,
            'pdf' => $thefile,
            'late_submission' => $request->late_submission,
            'status' => 1,
        ]);

        if ($success) {
            return redirect()->back()->with('success', 'Assignment Uploaded Created Successfully!');
        }
        else{
            return redirect()->back()->withErrors(['There is error somewhere, it is not your fault. Just try again']);
        }
    }
}
