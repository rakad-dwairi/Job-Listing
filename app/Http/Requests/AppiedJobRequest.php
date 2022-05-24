<?php

namespace App\Http\Requests;


use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
class AppiedJobRequest extends FormRequest
{
  
    public function authorize()
    {
        abort_if(Gate::denies('applied_job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resume' => [
                ['required','file','mimes:pdf','max:2048'],
             
            ],
            'job_id'=>['required'],

        ];
    }
}
