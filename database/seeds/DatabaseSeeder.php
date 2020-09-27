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
        // UserFactoryでランダムで作るものとは別に個別で作成したい場合はここで記述
        App\User::create([
            'name' => '管理者',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'), // この場合、「12345678」でログインできる
            'remember_token' => str_random(10),
            'role' => '99'
        ]);

        App\User::create([
            'name' => '主催者1',
            'email' => 'host1@gmail.com',
            'password' => Hash::make('12345678'), // この場合、「12345678」でログインできる
            'remember_token' => str_random(10),
            'role' => 10,
        ]);

        App\User::create([
            'name' => '主催者2',
            'email' => 'host2@gmail.com',
            'password' => Hash::make('12345678'), // この場合、「12345678」でログインできる
            'remember_token' => str_random(10),
            'role' => 11,
        ]);
        App\User::create([
            'name' => 'ゲストユーザー',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guestpass'), // この場合、「guestpass」でログインできる
            'remember_token' => str_random(10),
            'role' => 1,
        ]);
        // ファクトリーで設定したものを作るUsers(Lives)TableSeederを呼び出してシーダーを作成
        $this->call(UsersTableSeeder::class);
        $this->call(LivesTableSeeder::class);
    }
}
