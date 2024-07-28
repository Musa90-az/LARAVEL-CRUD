<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::with("employer")->latest()->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store(Request $request)
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required'
        ]);

        $job=Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
        Mail::to('abdulqudoosmujaddidi7@gmail.com')->queue(
            new JobPosted($job)
        );
        
        return redirect('/jobs');
    }


    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
        // $job = Job::find($id);
        // this is done automatically by route model binding

    }


    public function edit(Job $job)
    {


        // Gate::authorize('edit-job',$job);



        return view('jobs.edit', ['job' => $job]);
    }


    public function update(Request $request, Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required'
        ]);

        // $job = Job::findOrFail($id);

        // $job->title=request('title');
        // $job->salary=request('salary');
        // $job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),

        ]);

        return view('jobs.show', ['job' => $job]);
    }


    public function destroy(Job $job)
    {
        $job->delete();


        return redirect('/jobs');
    }
}
