<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin_user',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('00000000'), // この場合、「00000000」でログインできる
            'remember_token' => str_random(10),
            'role'=>'99'
        ]);

        App\User::create([
            'name' => 'host_user1',
            'email' => 'host1@gmail.com',
            'password' => Hash::make('00000000'), // この場合、「00000000」でログインできる
            'remember_token' => str_random(10),
            'role'=>10,
        ]);

        App\User::create([
            'name' => 'host_user2',
            'email' => 'host2@gmail.com',
            'password' => Hash::make('00000000'), // この場合、「00000000」でログインできる
            'remember_token' => str_random(10),
            'role'=>11,
        ]);

         $this->call(UsersTableSeeder::class);
         $this->call(LivesTableSeeder::class);
    }
}
