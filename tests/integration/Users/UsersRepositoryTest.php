<?php


use Larabook\Statuses\Status;
use Larabook\Users\User;
use Larabook\Users\UserRepository;

class UsersRepositoryTest extends IntegrationTestCase
{
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = new UserRepository;
    }

    /**
     * @test
     */
    public function it_paginates_all_users()
    {
        factory(User::class, 4)->create();

        $results = $this->repository->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /**
     * @test
     */
    public function it_finds_a_user_with_statuses_by_their_username()
    {
        // Given
        $user = factory(User::class)->create();

        $user->statuses()
            ->saveMany(factory(Status::class, 4)->make());

        // When
        $foundedUser = $this->repository->findByUsername($user->username);

        // Then
        $this->assertTrue($foundedUser->is($user));
        $this->assertCount(4, $foundedUser->statuses);

    }

    /**
 * @test
 */
    public function it_follows_a_user()
    {
        // Given
        list($tom, $ben) = factory(User::class, 2)->create();

        // When
        $this->repository->follow($tom->id, $ben);

        // Then
        $this->seeInDatabase('follows', [
            'followed_id' => $tom->id,
            'follower_id' => $ben->id,
        ]);

    }

    /**
     * @test
     */
    public function it_unfollows_a_user()
    {
        // Given
        list($tom, $ben) = factory(User::class, 2)->create();

        $this->repository->follow($tom->id, $ben);

        $this->seeInDatabase('follows', [
            'followed_id' => $tom->id,
            'follower_id' => $ben->id,
        ]);

        // When
        $this->repository->unfollow($tom->id, $ben);

        // Then
        $this->notSeeInDatabase('follows', [
            'followed_id' => $tom->id,
            'follower_id' => $ben->id,
        ]);

    }
}
