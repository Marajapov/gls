<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\Post\ModelName::truncate();

        //factory(\Model\Post\ModelName::class, 10)->create();
    }
}
