<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;

class SignUpTest extends FunctionalTestCase
{
    /**
     * @return void
     */
    public function testSignUp()
    {
        $this->visit('/')
            ->click('Sign Up!')
            ->onPage('/register')
            ->type('John Doe', 'username')
            ->type('john@example.com', 'email')
            ->type('demo', 'password')
            ->type('demo', 'password_confirmation')
            ->press('Sign Up')
            ->seePageIs('')
            ->see('Welcome to Larabook')
            ->seeInDatabase('users', ['username' => 'John Doe'])
            ->assertTrue(Auth::check());
    }
}
