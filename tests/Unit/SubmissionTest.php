<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Submission;
use App\Jobs\ProcessSubmission;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_can_submit(): void
    {
        $data = [
            'name' => 'testname',
            'email' => 'testname@email.com',
            'message' => 'testname message',
        ];

        $submission = Submission::create($data);

        $this->assertInstanceOf(Submission::class, $submission);
        $this->assertEquals($data['name'], $submission->name);
        $this->assertEquals($data['email'], $submission->email);
        $this->assertEquals($data['message'], $submission->message);
    }

    /**
     * A basic unit test example.
     */
    public function test_can_queue_submit(): void
    {
        Queue::fake();

        $data = [
            'name' => 'testname',
            'email' => 'testname@email.com',
            'message' => 'testname message',
        ];

        $submission = Submission::create($data);
        ProcessSubmission::dispatch($submission);

        Queue::assertPushed(ProcessSubmission::class, function ($job) use ($submission) {
            return $job->getSubmission()->id === $submission->id;
        });
    }
}
