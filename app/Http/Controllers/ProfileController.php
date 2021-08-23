<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserWorkExperience;
use App\UserEducation;
use App\UserSkill;
use Auth;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('userWorkExperience','userEducation','userSkill')->findorFail(Auth::id());
        return view('profile',compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
       $fileName = '';
       if($request->file('cv'))
       {
            $fileName = time().'.'.$request->cv->extension();
            $request->cv->move(public_path('uploads'), $fileName);
       }

       $userId = Auth::id();
       $user = User::findorFail($userId)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'cv' => $fileName,
       ]);

        UserWorkExperience::updateOrCreate([
                'user_id' => $userId
            ],[
                'user_id' => $userId,
                'job_title' => $request->input('job_title'),
                'company_name' => $request->input('company_name'),
                'started_date' => $request->input('started_date'),
                'industry' => $request->input('industry')
            ]
        );

        UserEducation::updateOrCreate([
                'user_id' => $userId
            ],[
                'user_id' => $userId,
                'degree' => $request->input('degree'),
                'school' => $request->input('school'),
                'completed_date' => $request->input('completed_date')
            ]

        );

        UserSkill::updateOrCreate([
                'user_id' => $userId
            ],[
                'user_id' => $userId,
                'name' => $request->input('skills')
            ]
        );

        return redirect()->route('profile')->with('success','Profile has been updated successfully');

    }
}
