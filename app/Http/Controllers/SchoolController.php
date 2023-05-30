<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Learner;
use App\Models\Lecture;
use App\Models\Assignment;
use App\Models\School;
use Auth;

class SchoolController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schools = School::where('deleted_at', NULL)->where('user_id', auth()->user()->id)->latest()->with(['catigory'])->get();
        // dd($schools);
        return view('user.school', compact('schools'));
    }

    public function create()
    {
        return view('user.createSchool');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:25',
            'category' => 'required',
            'audience' => 'required',
            'type_teaching' => 'required',
        ]);
        
        if($request->file('featured_image')){
            $image = base64_encode(file_get_contents($request->file('featured_image')->path()));
            $path = 'data:image/png;base64,'.$image;
        }
        else{
            $path = NULL;
        }
        $school_code = rand(9999, 999999);
        $success = School::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'featured_image' => $path,
            'type_teaching' => $request->type_teaching,
            'audience' => $request->audience,
            'featured_video' => $request->featured_video,
            'user_id' => $request->user_id,
            'school_code' => $school_code,
        ]);

        if ($success) {
            return redirect()->route('schoolview', ['school_code' => $school_code ])->with('success', 'School Created Successfully!');
        }
        else{
            return redirect()->back()->withErrors(['There is error somewhere, it is not your fault. Just try again']);
        }
    }

    public function view($school_code)
    {
        $school =  School::where('deleted_at', NULL)->where('school_code', $school_code)->first();
        if(!$school){
            return redirect()->back()->withErrors(['School not found. Just try again']);
        }

        if($school->status == 0){
            return redirect()->back()->withErrors(['The school has been deactivated by the owner.']);
        }
    
        $learners = Learner::where('deleted_at', NULL)->where('class_id', $school->id)->get();
        $lectures = Lecture::where('deleted_at', NULL)->where('school_id', $school->id)->get();
        $liveClasses = NULL;
        $quizzes = NULL;
        return $data= [
            'school' => $school,
            'learners' => $learners,
            'lectures' => $lectures,
            'quizzes' => $quizzes,
            'liveClasses' => $liveClasses,
        ];
        return view('user.viewSchool', compact('data'));
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
