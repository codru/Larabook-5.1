<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Larabook\Users\FollowUserJob;
use Larabook\Users\FollowUserRequest;
use Larabook\Users\UnfollowUserJob;
use Larabook\Users\UnfollowUserRequest;
use Laracasts\Flash\Flash;

class FollowsController extends Controller
{
    /**
     * Follow a user.
     *
     * @param FollowUserRequest $request
     * @return Response
     */
    public function store(FollowUserRequest $request)
    {
        $this->dispatchFrom(FollowUserJob::class, $request, ['userId' => Auth::id()]);

        Flash::success("You are following this user");

        return redirect()->back();
    }

    /**
     * Unfollow a user.
     *
     * @param UnfollowUserRequest $request
     * @return Response
     */
    public function destroy(UnfollowUserRequest $request)
    {
        $this->dispatchFrom(UnfollowUserJob::class, $request, ['userId' => Auth::id()]);

        Flash::success('You have now unfollowed this user.');

        return redirect()->back();
    }
}
