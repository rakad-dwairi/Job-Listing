<?php

namespace App\Http\Controllers;

use App\Category;
use App\ContactUs;
use App\Location;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function search(Request $request)
    {

        $jobs = Job::expiredDate()->with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }


    public function updateProfile(Request $request, $id)
    {
     $validate =   $request->validate([
            'name' => "required",
            'email' => "required|unique:users,email," . $id,
            'phone' => "nullable|regex:/^(07[7859]{1})[0-9]{7}$/",
            'address1' => "nullable",
            'address2' => "nullable",
        ]);

        $users = User::find($id);

        if($users){
            $users->update($validate);

            return redirect()->back()->with('message','profile updated successfully');
        }else{
            return redirect()->back()->with('error','something went wrong');

        }
    }


    public function updateImage(Request $request,$id)
    {
        $validate =   $request->validate([
            'image' => "required|mimes:png,jpg,jpeg,gif",
        ]);
        $data = User::find($id);

        if($data){

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('Image'), $filename);

                $data->update(['image'=>$filename]);
            }
            return redirect()->back()->with('message','Image Profile updated successfully');

        }else{
            return redirect()->back()->with('error','something went wrong');

        }
    }


    public function contact_us()
    {
        return view("contact_us");
    }


    public function sendContact(Request $request)
    {

    $validate =   $request->validate([
            'name' => "required",
            'email' => "required",
            'subject' => "required",
            'message' => "required",
        ]);



        ContactUs::create($validate);

        return redirect()->back()->with('message','Your message sent successfully');

    }
}
