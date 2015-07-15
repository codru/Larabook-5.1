<?php

namespace Larabook\Users;

use App\Http\Requests\SaveFollowingRequest;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Auth;

class UnfollowUserJob extends Job implements SelfHandling
{
    protected $userIdToUnfollow;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param $userIdToUnfollow
     * @param $userId
     */
    public function __construct($userIdToUnfollow, $userId)
    {
        $this->userIdToUnfollow = $userIdToUnfollow;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param $request
     * @param UserRepository $repository
     * @return mixed
     */
    public function handle(UserRepository $repository)
    {
        $user = $repository->findById($this->userId);

        $repository->unfollow($this->userIdToUnfollow, $user);

        return $user;
    }
}
