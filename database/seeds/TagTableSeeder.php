<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\Tag\Tag::truncate();

        factory(\Model\Tag\Tag::class, 50)->create();
    }
}
