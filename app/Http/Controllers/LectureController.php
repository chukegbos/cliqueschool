<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Learner;
use App\Models\Lecture;
use App\Models\Assignment;
use App\Models\School;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
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


    public function create($school_code)
    {
        $school = School::where('deleted_at', NULL)->where('user_id', auth()->user()->id)->where('school_code', $school_code)->first();
        if(!$school){
            return redirect()->back()->withErrors(['School not found. Just try again']);
        }
        return view('user.createLecture', compact('school'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $lecture_code = rand(9999, 999999);

        if($request->file('featured_image')){
            $image = base64_encode(file_get_contents($request->file('featured_image')->path()));
            $path = 'data:image/png;base64,'.$image;
        }

        if($request->pdf){
            $this->validate($request, [
                "pdf" => "required|mimes:pdf|max:10000",
            ]);
            
            $uploadedFile = $request->file('pdf');
            $filename = $lecture_code . 'pdf';
            $filePath = 'lectures/'.$filename;

            $pdf = Storage::disk('public')->putFileAs($filePath, $uploadedFile, $filename);
            $pdf = Storage::disk('public')->url($filePath);
        }
      
        if($request->video){
            $this->validate($request, [
                'video' => 'required|file|mimetypes:video/mp4',
            ]);

            $fileName = $lecture_code . 'mp4';
            $filePath = 'videos/' . $fileName;

            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

            // File URL to access the video in frontend
            $url = Storage::disk('public')->url($filePath);
        }

        

        $success = Lecture::create([
            'school_id' => $request->school_id,
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $path,
            'video' => $url ?? Null,
            'pdf' => $pdf ?? Null,
            'featured_video' => $request->featured_video,
            'lecture_code' => $lecture_code,
        ]);

        if ($success) {
            return redirect()->route('lectureview', ['lecture_code' => $lecture_code ])->with('success', 'Lecture Created Successfully!');
        }
        else{
            return redirect()->back()->withErrors(['There is error somewhere, it is not your fault. Just try again']);
        }
    }

    public function view($lecture_code)
    {
        $lecture =  Lecture::where('deleted_at', NULL)->where('lecture_code', $lecture_code)->first();
        if(!$lecture){
            return redirect()->back()->withErrors(['lecture not found. Just try again']);
        }
    
        $assignment = Assignment::where('deleted_at', NULL)->find($lecture->id);
        
        $data= [
            'assignment' => $assignment,
            'lecture' => $lecture,
        ];
        
        return view('user.lectureSchool', compact('data'));
    }

    public function destroy($id)
    {
        $school =  School::where('deleted_at', NULL)->findOrFail($id);
        $school->deleted_at = NUll;
        $school->update();
        return redirect()->back()->with('success', 'School deleted!');
    }

    public function status($id)
    {
        $school =  School::where('deleted_at', NULL)->findOrFail($id);
        if ($school->status==1) {
            $school->status = 0;
            $status = 'School Deactivated';
        }
        else {
            $school->status = 1;
            $status = 'School Activated';
        }

        $school->update();
        return redirect()->back()->with('success', $status);
    }
}
