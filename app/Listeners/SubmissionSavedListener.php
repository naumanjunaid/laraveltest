<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        $message = [
            'message' => 'Submission saved succefully!',
            'name' => $event->submission->name,
            'email' => $event->submission->email
        ];

        Log::info('Processing submission:', $message);
    }
}
