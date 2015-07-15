<?php

namespace Larabook\Comments;

use Illuminate\Database\Eloquent\Model;
use Larabook\Statuses\Status;
use Larabook\Users\User;

class Comment extends Model
{
    protected $fillable = [
        'status_id',
        'body',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public static function publish($status_id, $body)
    {
        $comment = new static (compact('status_id', 'body'));

        return $comment;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
