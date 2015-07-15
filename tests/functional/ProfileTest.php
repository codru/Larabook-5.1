<?php


use Larabook\Statuses\Status;
use Larabook\Users\User;

class ProfileTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_shows_a_profile_of_current_user()
    {
        $user = factory(User::class)->create();
        $user->statuses()
            ->save(
                factory(Status::class)->make([
                    'body' => 'My new status.'
                ]));

        $this->actingAs($user)
            ->visit('/')
            ->click('Your Profile')
            ->seePageIs("/@$user->username")
            ->see('My new status.');
    }
}
