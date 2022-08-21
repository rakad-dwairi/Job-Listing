<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\ContactUs;
use App\Location;
use App\Job;
use App\User;

class ProfileUserController extends Controller
{
    public function index()
    {
        $searchLocations = Location::pluck('name', 'id');
        $searchCategories = Category::pluck('name', 'id');
        $searchByCategory = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $jobs = Job::expiredDate()->with('company')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs']));
    }

    public function UserDashoard()
    {
        return view('admin.home');
    }
}
