<?php

namespace Larabook\Registration;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;
use Larabook\Users\User;
use Larabook\Users\UserRepository;

class RegisterUserJob extends Job implements SelfHandling
{
    protected $password;
    protected $username;
    protected $email;

    /**
     * Create a new job instance.
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function handle(UserRepository $repository)
    {
        $username = $this->username;
        $email = $this->email;
        $password = $this->password;

        $user = User::register(
            $username, $email, $password
        );

        $repository->save($user);

        return $user;
    }

}
