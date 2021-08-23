<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\UserJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $jobs = Job::getJobs($userId,'');

        return view('home',compact('jobs'));
    }

    public function search(Request $request)
    {
        if($request->search)
        {
            $input = $request->search;
            $jobs  = Job::getJobs(Auth::id(),$input);
            return view('home',compact('jobs','input'));
        }

        return redirect()->route('home');
    }

    public function apply(Request $request)
    {
        if(UserJob::where('job_id',$request->id)->where('user_id', Auth::id())->exists())
        {
            return redirect('/')->with('success','You have already applied for this job');
        }

        UserJob::create([
            'user_id' => Auth::id(),
            'job_id' => $request->id]
        );

        return redirect('/')->with('success','You have successfully applied');
    }
}
