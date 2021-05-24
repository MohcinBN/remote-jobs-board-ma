<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $latestJobs = Job::paginate(8);
        return view('backend.job.index', compact('latestJobs'));
    }

    public function latestAddedJobs()
    {
        //
        $latestJobsForHomePage = Job::orderBy('id', 'DESC')->paginate(8);
        return view('welcome', compact('latestJobsForHomePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store a new job
       $request->validate([
            'company_name' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'city' => 'required',
        ]);

        $job = new Job;
        $job->company_name = trim($request->company_name);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jobToBeEdited = Job::findOrfail($id);
        //dd($jobToBeEdited);
        return view('backend.job.edit', compact('jobToBeEdited'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
