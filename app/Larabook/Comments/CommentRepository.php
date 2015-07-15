<?php


namespace Larabook\Comments;


use Larabook\Users\User;

class CommentRepository
{
    public function save(Comment $comment, User $user)
    {
        return $user->comments()->save($comment);
    }
}
