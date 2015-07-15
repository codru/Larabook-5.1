<?php

use Illuminate\Database\Seeder;
use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::lists('id')->toArray();

        factory(Status::class, 1000)->make()
            ->each(
                function (Status $s) use ($users) {
                    $s->user_id = $users[array_rand($users)];
                    $s->created_at = mt_rand(time() - 365 * 24 * 60 * 60, time());
                    $s->save();
                }
            );
    }
}
