<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{





    public function store(Request $request)
    {

        $request->validate(['email'=>"required|email|unique:subscriptions,email"]);


        $email = Subscription::create(['email'=>$request->email]);

        return redirect()->back()->with('success', 'You Are Subscribe Successfully');
    }


}
