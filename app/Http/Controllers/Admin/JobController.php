<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\UserJob;
use App\Http\Requests\StoreJobRequest;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderByDesc('id')->get();
        return view('admin.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        Job::create([
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('jobs.index')->with('status','Job has been added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findorFail($id);
        return view('admin.jobs.edit', compact( 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreJobRequest $request, $id)
    {
        Job::findorFail($id)->update([
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('jobs.index')->with('status','Job has been updated successfully');
    }



    public function applicant()
    {
        $userJobs = UserJob::with('user','job')->orderByDesc('id')->get();

        return view('admin.jobs.applicant',compact('userJobs'));
    }
}
