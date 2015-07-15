<?php


namespace Larabook\Users;


class UserRepository 
{

    /**
     * Persist a user
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * Fetch a user by username
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * Find user by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::whereId($id)->first();
    }

    /**
     * @param $idUserToFollow
     * @param User $user
     */
    public function follow($idUserToFollow, User $user)
    {
        $user->followedUsers()->attach($idUserToFollow);
    }

    /**
     * @param $idUserToUnfollow
     * @param User $user
     */
    public function unfollow($idUserToUnfollow, User $user)
    {
        $user->followedUsers()->detach($idUserToUnfollow);
    }
}
