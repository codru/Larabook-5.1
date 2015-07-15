<?php


namespace Larabook\Users;

use Codru\Presenter\Contracts\PresentableContract;
use Codru\Presenter\PresentableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Larabook\Comments\Comment;
use Larabook\Registration\Events\UserHasRegistered;
use Larabook\Statuses\Status;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, PresentableContract
{
    use Authenticatable, CanResetPassword, PresentableTrait, FollowableTrait;

    protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Passwords must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * A user has many statuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany(Status::class)->latest();
    }

    /**
     * A user has many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        Event::fire(new UserHasRegistered($user));

        return $user;
    }

    /**
     * Determine if a given user is the same as given one
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if (!$user instanceof User) {
            return false;
        }
        return $this->username === $user->username;
    }

}
