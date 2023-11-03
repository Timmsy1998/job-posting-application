<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    protected function validateJobRequest($request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'postedAt' => 'required|date',
        ]);
    }

    public function index()
    {
        return Job::all();
    }

    public function store(Request $request)
    {
        $validator = $this->validateJobRequest($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400); // Bad Request
        }

        $job = Job::create($request->all());
        return response()->json($job, 201);
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function update(Request $request, Job $job)
    {
        $validator = $this->validateJobRequest($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400); // Bad Request
        }

        $job->update($request->all());
        return response()->json($job, 200);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }
}
