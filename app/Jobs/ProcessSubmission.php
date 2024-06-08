<?php

namespace App\Jobs;

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
        Log::info('Submission data:', $data);
        $this->submission = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $submission = Submission::create($this->submission);
            Log::info('Processing submission:', $submission);
        } catch (\Exception $e) {
            Log::error('Error creating submission: ' . $e->getMessage());
        }
    }
}
