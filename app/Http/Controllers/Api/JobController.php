<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobNotification;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request){
         $job = json_decode(request('job'));
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
        $data['title_en'] = $job->title_en;
        $data['title_np'] = $job->tilte_np;
        $data['salary_min'] = $job->salary_min;
        $data['salary_max'] = $job->salary_max;
        $data['lt_number'] = $job->lt_number;
        $data['expires_on'] = $job->expires_on;
        $data['no_of_vacancies'] = $job->no_of_vacancies;
        $data['status'] = $job->status;
        $data['is_promoted'] = $job->is_promoted;

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
