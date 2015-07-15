<?php


use Larabook\Statuses\Status;
use Larabook\Users\User;

class PostStatusesTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_post_statuses_to_profile()
    {
        $user = factory(User::class)->create();

        $status = factory(Status::class)->make();
        $input = $status->toArray();


        $this->actingAs($user)
            ->visit('/statuses')
            ->type($input['body'], 'body')
            ->press('Post Status');
//            ->submitForm('Post Status', $input);


        $this->seePageIs('/statuses')
            ->seeInDatabase('statuses', $input)
            ->see($input['body']);
    }
}
