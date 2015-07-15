<?php

use Illuminate\Support\Facades\Auth;
use Larabook\Users\User;

class SignInTest extends FunctionalTestCase
{
    public function testSignIn()
    {
        factory(User::class)->create(
            [
                'email' => 'demo@example.com',
                'password' => 'demo'
            ]
        );

        $this->visit('/login')
            ->type('demo@example.com', 'email')
            ->type('demo', 'password')
            ->press('Sign In')
            ->seePageIs('/statuses')
            ->see('Welcome back!')
            ->assertTrue(Auth::check());
    }
}
