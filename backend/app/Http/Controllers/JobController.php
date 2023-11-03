<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return Job::all();
    }

    public function store(Request $request)
    {
        return Job::create($request->all());
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return $job;
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }
}
