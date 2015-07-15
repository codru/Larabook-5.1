<?php

namespace Larabook\Statuses;

use ArrayAccess;
use Codru\Presenter\Contracts\PresentableContract;
use Codru\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use Larabook\Comments\Comment;
use Larabook\Users\User;

class Status extends Model implements PresentableContract
{
    use PresentableTrait;

    /**
     * @var string
     */
    protected $presenter = StatusPresenter::class;

    /**
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    /**
     * A status belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A status has many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param $input
     * @return static
     */
    public static function publish($input)
    {
        $status = new static($input);

        // raise an event

        return $status;
    }


}
