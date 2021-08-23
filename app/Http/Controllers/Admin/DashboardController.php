<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserJob;
use App\Http\Requests\StoreJobRequest;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::where('is_admin','!=',1)->count();
        return view('admin.dashboard',compact('userCount'));
    }


}
