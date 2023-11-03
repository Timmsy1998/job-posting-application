<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule; // Import the Rule class for validation
use Validator; // Import the Validator class for validation
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // This method defines validation rules for the job posting request.
    protected function validateJobRequest($request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string|max:255', // Title is required, should be a string, and have a maximum length of 255 characters.
            'description' => 'required|string', // Description is required and should be a string.
            'salary' => 'required|string|max:255', // Salary is required, should be a string, and have a maximum length of 255 characters.
            'company' => 'required|string|max:255', // Company is required, should be a string, and have a maximum length of 255 characters.
            'postedAt' => 'required|date', // PostedAt is required and should be a valid date.
        ]);
    }

    // This method retrieves a list of all job postings.
    public function index()
    {
        return Job::all();
    }

    // This method creates a new job posting.
    public function store(Request $request)
    {
        $validator = $this->validateJobRequest($request);

        // Check if validation fails and return validation error messages if it does.
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400); // Respond with a 400 (Bad Request) status code and validation error messages.
        }

        // If validation passes, create a new job posting.
        $job = Job::create($request->all());
        return response()->json($job, 201); // Respond with the created job posting and a 201 (Created) status code.
    }

    // This method retrieves the details of a specific job posting.
    public function show(Job $job)
    {
        return $job;
    }

    // This method allows a user to update a specific job posting.
    public function update(Request $request, Job $job)
    {
        $validator = $this->validateJobRequest($request);

        // Check if validation fails and return validation error messages if it does.
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400); // Respond with a 400 (Bad Request) status code and validation error messages.
        }

        // If validation passes, update the job posting.
        $job->update($request->all());
        return response()->json($job, 200); // Respond with the updated job posting and a 200 (OK) status code.
    }

    // This method allows a user to delete a specific job posting.
    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204); // Respond with no content and a 204 (No Content) status code.
    }
}
