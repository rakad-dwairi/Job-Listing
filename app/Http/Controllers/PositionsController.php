<?php

namespace App\Http\Controllers;
use App\Job;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jobs = Job::expiredDate()->with('company')
        // ->paginate(7);
        $jobs = Job::all();

        return view('positions', compact(['jobs']));
    }

    public function show($id)
    {
        //
    }

}
