<?php


namespace Larabook\Users;


use Codru\Presenter\Presenter;


class UserPresenter extends Presenter
{
    /**
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/$email?s=$size";
    }

    /**
     * Human style count of followers
     *
     * @return string
     */
    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);

        return "$count $plural";
    }

    /**
     * Human style count of statuses
     *
     * @return string
     */
    public function statusCount()
    {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);

        return "$count $plural";
    }
}
