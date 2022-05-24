<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Location;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::expiredDate()->with('company')
            ->paginate(7);

        $banner = 'Jobs';
// dd($jobs);
        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function show($jobs)
    {

        $job = Job::expiredDate()->find($jobs);
        // $job->expiredDate()->get();
        
        if($job){
            $job->load('company');
            
            return view('jobs.show', compact('job'));
        }else{
            return redirect()->back()->with('error','This Job Not Valid');
        }

    }
}
