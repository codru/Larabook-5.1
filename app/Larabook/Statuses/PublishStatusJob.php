<?php

namespace Larabook\Statuses;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class PublishStatusJob extends Job implements SelfHandling
{
    protected $repository;

    /**
     * Create a new job instance.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @param StatusRepository $repository
     * @return static
     */
    public function handle(StatusRepository $repository)
    {
        $body = $this->body;

        $status = Status::publish(compact('body'));

        $status = $repository->save($status);

        return $status;
    }
}
