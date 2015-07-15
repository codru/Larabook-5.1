<?php

namespace Larabook\Users;


trait FollowableTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followedUsers()
    {
        return $this->belongsToMany(
            static::class,
            'follows',
            'follower_id',
            'followed_id'
        )->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(
            static::class,
            'follows',
            'followed_id',
            'follower_id'
        )->withTimestamps();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isFollowing(User $user)
    {
        $followedUsersIds = $this->followedUsers()
            ->lists('followed_id')->toArray();

        return in_array($user->id, $followedUsersIds);
    }
}
