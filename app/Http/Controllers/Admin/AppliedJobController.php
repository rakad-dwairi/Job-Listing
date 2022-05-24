<?php

namespace App\Http\Controllers\Admin;

use App\AppliedJob;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppiedJobRequest;
use App\Mail\ResumeMail;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AppliedJobController extends Controller
{
    public function index()
    {
        // dd();
        if (auth()->user()->roles[0]->id == 1) {

            $appliedJob = AppliedJob::all();
        } else {
            $appliedJob = AppliedJob::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.appliedJobs.index', compact('appliedJob'));
    }

    public function store(AppiedJobRequest $request)
    {

        $files = $request->file('resume');
        $folder = public_path('../public/storage/' . \Auth::user()->email . '/');

        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }


        $filename = time() . '.' . $files->getClientOriginalExtension();
        $files->move($folder, $filename);

        AppliedJob::create([
            'resume' => $filename,
            'user_id' =>  \Auth::user()->id,
            'job_id' => $request->job_id,
            'status' => 0,
        ]);



        return redirect()->back()->with('success', 'Resume Sent successfully');
    }


    public function downloadResume(Request $request)
    {

        $email = $request->email;
        $file_name = $request->file_name;

        //PDF file is stored under project/public/download/info.pdf
        $folder = public_path('\storage\\' . $email . '/' . $file_name);


        $headers = array(
            'Content-Type: application/pdf',
        );

        $name ="Job Listings";
                Mail::to('zyoud1133@gmail.com')->send(new ResumeMail($name));



        // update status
        $appliedJob = AppliedJob::find($request->id)->update(['status' => 1]);



        return Response::download($folder, $email . '.pdf', $headers);
    }


    public function destroy(Request $request, AppliedJob $appliedJob)
    {
        $email = $request->email;
        $file_name = $request->file_name;
        $folder = public_path('\storage\\' . $email . '\\' . $file_name);

        // Storage::delete($folder);
        if (file_exists($folder)) {

            @unlink($folder);

        }
        $appliedJob->delete();

        return redirect()->back()->with('success', 'Resume Deleted successfully');
    }
}
