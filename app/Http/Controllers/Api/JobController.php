<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobNotification;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(){

        $data = request()->validate([
            'manpower_name' => 'required|string',
            'country' => 'required|string',
            'title_en' => 'required|string',
            'title_np' => 'required|string',
            'salary_min' => 'required',
            'salary_max' => 'required',
            'lt_number' => 'sometimes',
            'expires_on' => 'required|date_format:Y-m-d',
            'final_interview_date' => 'sometimes|date_format:Y-m-d',
            'no_of_vacancies' => 'required',
            'status' => 'required',
            'is_promoted' => 'boolean',
        ]);

        $job_notification = new JobNotification($data);

        if($job_notification->save()){
            
            if(request('positions')){
                $job_notification->positions()->sync(request('positions'));  
            }

            return response()->json(['sucess' => 'job notification saved']);
        }

        return response()->json(['error' => 'something went wrong'], 500);
    }
}
