<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('userWorkExperience','userEducation','userSkill')
                ->where('is_admin','!=',1)
                ->orderByDesc('id')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function search(Request $request)
    {
        $input = $request->only('name','email','job_title','industry','education','skill');

        $users = User::with('userWorkExperience','userEducation','userSkill')
            ->whereHas('userWorkExperience', function ($query) use ($input) {
            if($input['job_title'] != '')
            {
                $query->where('job_title', 'like', '%' .$input['job_title']. '%');
            }
            if($input['industry'] != '')
            {
                $query->where('industry', 'like', '%' .$input['industry']. '%');
            }
        })->whereHas('userEducation', function ($query) use ($input) {
            if($input['education'] != '')
            {
                $query->where('degree', 'like', '%' .$input['education']. '%');
            }
        })->whereHas('userSkill', function ($query) use ($input) {
            if($input['skill'] != '')
            {
                $query->where('name', 'like', '%' .$input['skill']. '%');
            }
        });

        if($input['name'] != '')
        {
            $users =  $users->where('name','like', '%' . $input['name'] . '%');
        }
        if($input['email'] != '')
        {
            $users =  $users->where('email','like', '%' . $input['email'] . '%');
        }

        $users =  $users->where('is_admin','!=',1)
            ->paginate(10);
        return view('admin.users.index',compact('users'));
    }


}
