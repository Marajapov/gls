<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\Category\ModelName::truncate();

        \Model\Category\ModelName::create([
            'id'        => 1,
            'name'     => 'Курьерские услуги',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 2,
            'name'     => 'Бытовой ремонт',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 3,
            'name'     => 'Грузоперевозки',
            'published' => true,
        ]);

        // factory(\Model\Category\ModelName::class, 10)->create();
    }
}
