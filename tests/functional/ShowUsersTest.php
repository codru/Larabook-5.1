<?php


use Larabook\Users\User;

class ShowUsersTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_shows_all_registered_users()
    {
        factory(User::class)->create(['username' => 'Foo']);
        factory(User::class)->create(['username' => 'Bar']);

        $this->visit('/users')
            ->see('Foo')
            ->see('Bar');
    }
}
