<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users',
        'statuses',
    ];

    protected $seeders = [
        UsersTableSeeder::class,
        StatusesTableSeeder::class,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }

        Model::reguard();



    }

    private function cleanDatabase()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
