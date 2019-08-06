<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        factory(User::class, 10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
