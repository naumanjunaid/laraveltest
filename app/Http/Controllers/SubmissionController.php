<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\ProcessSubmission;
use App\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubmissionRequest $request)
    {
        $data['name'] = $request->post('name');
        $data['email'] = $request->post('email');
        $data['message'] = $request->post('message');


        ProcessSubmission::dispatch($data);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!'
        ], 200);
    }
}
