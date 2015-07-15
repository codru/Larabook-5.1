<?php

use Illuminate\Database\Seeder;
use Larabook\Users\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 50)->create(['password' => 'secret']);
    }
}
