<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        //
        $latestJobs = Job::orderBy('id', 'DESC')->paginate(8);
        return view('backend.job.index', compact('latestJobs'));
    }

    public function latestAddedJobs(Request $request)
    {
        //
        $latestJobsForHomePage = Job::where('status', 1)->orderBy('id', 'DESC')->paginate(8);

        return view('welcome', compact('latestJobsForHomePage'));

    }
    
    public function create()
    {
        return view('backend.job.create');
    }

    public function create_job_from_visitors()
    {
        return view('front-end.create');
    }

    public function store(Request $request)
    {
        // store a new job
       $request->validate([
            'company_name' => 'required',
            'small_description' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'city' => 'required',
        ]);

        $job = new Job;
        $job->company_name = trim($request->company_name);
        $job->small_description = $request->small_description;
        $job->title = trim($request->title);
        $job->url = trim($request->url);
        $job->type = $request->type;
        $job->city = $request->city;

        $job->save();

        //dd($job);

        return redirect()->route('job.create')->with('status','Job created successfully :) ');
         

        // return json for API using..
        return response()->json('Job created!');

    }

    public function store_from_ui(Request $request)
    {
        // store a new job
       $request->validate([
            'company_name' => 'required',
            'small_description' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'city' => 'required',
        ]);

        $job = new Job;
        $job->company_name = trim($request->company_name);
        $job->small_description = $request->small_description;
        $job->title = trim($request->title);
        $job->url = trim($request->url);
        $job->type = $request->type;
        $job->city = $request->city;
        $job->sender_email = $request->sender_email;

        $job->save();

        //dd($job);

        return redirect()->route('visitor.create')->with('status_job_submited','Your Job has been sent, one of our admins will review it and accept it later, Greetings :) ');
         

        // return json for API using..
        return response()->json('Job created!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $jobToBeEdited = Job::findOrfail($id);
        //dd($jobToBeEdited);
        return view('backend.job.edit', compact('jobToBeEdited'));
    }

    public function update(Request $request, $id)
    {
        // update the job id
        $request->validate([
            'company_name' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'city' => 'required',
        ]);

        $job = Job::FindOrFail($id);
        $job->company_name = trim($request->company_name);
        $job->title = trim($request->title);
        $job->url = trim($request->url);
        $job->type = $request->type;
        $job->city = $request->city;

        $job->save();
        
        //dd($job);

        return redirect()->route('job.create')->with('status','Job update successfully :) ');
        

        // return json for API using..
        return response()->json('Job Updated!');
    }

    public function destroy($id)
    {
        // delete a job
        $jobToBeDeleted = Job::FindOrFail($id);
        $jobToBeDeleted->delete();


        return redirect()->route('job.index')->with('status','Job Deleted successfully :( ');
        
        // return json for API using..
        return response()->json([
            'success' => 'Job Deleted successfully :( '
        ]);
    }

    public function changeJobStatus(Request $request)
    {
        $changeStatus = Job::find($request->job_id);
        $changeStatus->status = $request->status;
        $changeStatus->save();
  
        return response()->json([
            'success'=>'Job status has been changed']
        );
        
        // try {

        //     $changeStatus = Job::FindOrfail($id);
        //     if ($changeStatus->status == 1) {
        //         $changeStatus->status == 0;
        //     } else {
        //         $changeStatus->status == 1;
        //     }

        //     return response()->json([
        //         'data' => [
        //           'success' => $changeStatus->save(),
        //           'message' => 'status changedr'
        //         ]
        //       ]);
            
          
        //   } catch (\Exception $e) {
          
        //       return $e->getMessage();
        //   }          
        
    }
}
