<?php

namespace Larabook\Users;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class FollowUserJob extends Job implements SelfHandling
{
    protected $userIdToFollow;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param $userIdToFollow
     * @param $userId
     */
    public function __construct($userIdToFollow, $userId)
    {
        $this->userIdToFollow = $userIdToFollow;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param UserRepository $repository
     * @return mixed
     */
    public function handle(UserRepository $repository)
    {
        $user = $repository->findById($this->userId);

        $repository->follow($this->userIdToFollow, $user);

        return $user;
    }
}
