<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Subscription;
use App\SendSubscription;
use App\Subscription as AppSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{

    const VIEW = "admin.subscription.";

    function __construct()
    {

        $this->SendSubscription = new SendSubscription();
        $this->subscription = new AppSubscription();
    }


    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription = $this->SendSubscription::orderBy('created_at', 'desc')->get();

        return view(self::VIEW . 'index', compact('subscription'));
    }



    public function send(Request $request)
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validate = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        $details = [
            'title' => $request->title,
            'body' => $request->body
        ];

        $email = $this->subscription->get("email");

        // dd($e    mail);
        foreach ($email as $key => $value) {

            \Mail::to($value->email)->send(new Subscription($details));
        }

        $this->SendSubscription::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'count_send'=>count($email),
        ]);

        return redirect()->back()->with('success', 'message send successfully');
    }
    public function create()
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
