<?php


use Larabook\Statuses\Status;
use Larabook\Statuses\StatusRepository;
use Larabook\Users\User;

class StatusRepositoryTest extends IntegrationTestCase
{
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = new StatusRepository;
    }

    /**
     * @test
     */
    public function it_gets_all_statuses_for_user()
    {
        //Given I have two users
        // And statuses for both of them
        $users = factory(User::class, 2)
            ->create()
            ->each(
                function (User $u) {
                    $u->statuses()->saveMany(
                        factory(Status::class, 3)->make()
                    );
                }
            );

        //When I fetch statuses for one user
        $statusesForUser = $this->repository->getAllForUser($users[0]);

        // Then I should receive only the relevant ones
        $this->assertCount(3, $statusesForUser);
    }

    /**
     * @test
     */
    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = factory(Status::class)->make();

        // And an existing user
        $user = factory(User::class)->create();

        // And this user is authenticated
        $this->actingAs($user);

        // When I try to persist this status
        $this->repository->save($status);

        // Then it should be saved
        $this->seeInDatabase('statuses', $status->toArray());
        // And the status should have the correct user_id
        $this->assertEquals($user->id, $status->user_id);
    }
}
