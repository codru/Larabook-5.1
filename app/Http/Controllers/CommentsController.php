<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Larabook\Comments\PublishCommentJob;
use Larabook\Comments\PublishCommentRequest;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  PublishCommentRequest  $request
     * @return Response
     */
    public function store(PublishCommentRequest $request)
    {
        $this->dispatchFrom(PublishCommentJob::class, $request, ['user_id' => Auth::id()]);

        return redirect()->back();
    }



}
