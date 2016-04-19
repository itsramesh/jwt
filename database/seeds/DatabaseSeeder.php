<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['name' => 'amit', 'email' => 'amit@gmail.com', 'password' => Hash::make('amit')],
            ['name' => 'dhanraj', 'email' => 'dhanraj@gmail.io', 'password' => Hash::make('dhanraj')],
            ['name' => 'ramesh', 'email' => 'ramesh@gmail.io', 'password' => Hash::make('ramesh')],
            ['name' => 'kumar', 'email' => 'kumar@gmail.io', 'password' => Hash::make('kumar')],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
        Model::reguard();
    }
}
