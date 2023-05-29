<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeFrontController extends Controller
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
    public function profile()
    {
        return view('user.profile');
    }

    public function setup()
    {
        return view('user.setup');
    }

    public function storesetup(Request $request)
    {
        if($request->name){
            $this->validate($request, [
                'firstname' => 'required|string|max:25',
                'lastname' => 'required|string|max:25',
                'description' => 'required',
                'email' => 'required|email',
            ]);
        
            $user = User::where('deleted_at', NULL)->findOrFail(auth()->user()->id);
            
            if($request->file('image')){
                $image = base64_encode(file_get_contents($request->file('image')->path()));
                $path = 'data:image/png;base64,'.$image;
            }
            else{
                $path = $user->image;
            }

            $success = $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'description' => $request->description,
                'image' => $path,
                'phone' => $request->phone,
                'email' => $request->email,
                'linkedin' => $request->linkedin,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'settings' => 1,
            ]);
            if ($success) {
                return redirect()->route('home')->with('success', 'Profile Updated Successfully!');
            }
        }
    }
}
