<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $submission;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->submission = $data;
    }

    /**
     * Get the submission instance.
     *
     * @return Submission
     */
    public function getSubmission(): Submission
    {
        return $this->submission;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $submission = Submission::create($this->submission);
            Log::info('Processing submission:', $this->submission);
            event(new SubmissionSaved($submission));
        } catch (\Exception $e) {
            Log::error('Error creating submission: ' . $e->getMessage());
        }
    }
}
