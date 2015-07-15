<?php

namespace Larabook\Comments;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Larabook\Users\UserRepository;

class PublishCommentJob extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $user_id;
    /**
     * @var
     */
    private $status_id;
    /**
     * @var
     */
    private $body;

    /**
     * Create a new job instance.
     *
     * @param $user_id
     * @param $status_id
     * @param $body
     */
    public function __construct($user_id, $status_id, $body)
    {
        //
        $this->user_id = $user_id;
        $this->status_id = $status_id;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @param CommentRepository $repository
     * @param UserRepository $userRepository
     * @return static
     */
    public function handle(CommentRepository $repository, UserRepository $userRepository)
    {
        $user_id = $this->user_id;
        $status_id = $this->status_id;
        $body = $this->body;
        $comment = Comment::publish($status_id, $body);

        $user = $userRepository->findById($user_id);

        $repository->save($comment, $user);

        return $comment;
    }
}
