<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Job;

class JobControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_jobs()
    {
        $response = $this->get('/api/jobs');

        $response->assertStatus(200);
    }

    public function test_can_create_a_job()
    {
        $data = [
            'title' => 'Job Title',
            'description' => 'Job Description',
            'salary' => 'Job Salary',
            'company' => 'Company Name',
            'postedAt' => '2023-03-01',
        ];

        $response = $this->post('/api/jobs', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('jobs', $data);
    }

    public function test_can_show_job_details()
    {
        $job = Job::factory()->create();

        $response = $this->get('/api/jobs/' . $job->id);

        $response->assertStatus(200);
    }

    public function test_can_update_a_job()
    {
        $job = Job::factory()->create();
        $newData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'salary' => 'Updated Salary',
            'company' => 'Updated Company',
            'postedAt' => '2023-03-02',
        ];

        $response = $this->put('/api/jobs/' . $job->id, $newData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('jobs', $newData);
    }

    public function test_can_delete_a_job()
    {
        $job = Job::factory()->create();

        $response = $this->delete('/api/jobs/' . $job->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('jobs', ['id' => $job->id]);
    }
}

