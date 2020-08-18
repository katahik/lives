<?php

use Illuminate\Database\Seeder;

class LivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Live::class, 20)->create();
    }
}
