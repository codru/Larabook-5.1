<?php


use Larabook\Users\User;

class FollowingTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_follows_and_unfollows_a_user()
    {
        // setup
        list($tom, $ben) = factory(User::class, 2)->create();
        // actions
        $this->actingAs($tom)
            ->visit('/')
            ->click('Browse Users')
            ->click($ben->username)
            ->seePageIs("/@$ben->username")
            ->press("Follow $ben->username")
            ->seePageIs("/@$ben->username")
            ->see("Unfollow $ben->username")
            ->press("Unfollow $ben->username")
            ->seePageIs("/@$ben->username")
            ->see("Follow $ben->username")
            ->dontSee("Unfollow $ben->username");



    }
}
