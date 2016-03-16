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
            'name'     => 'Уборка и помощь по хозяйству',
            'class'     => 'clean',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 2,
            'name'     => 'Грузоперевозки',
            'class'     => 'cargo',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 3,
            'name'     => 'Бытовой ремонт',
            'class'     => 'home',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 4,
            'name'     => 'Аварийное вскрытие замков',
            'class'     => 'opening',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 5,
            'name'     => 'Услуги спецтехники',
            'class'     => 'spectech',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 6,
            'name'     => 'Доставка сыпучих стройматериалов',
            'class'     => 'bulk',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 7,
            'name'     => 'Прокат строительного инструмента',
            'class'     => 'tool',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 8,
            'name'     => 'Посуточная аренда жилья',
            'class'     => 'rent',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 9,
            'name'     => 'Вывоз мусора',
            'class'     => 'trash',
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 10,
            'name'     => 'Продажа б/у стройматериалов',
            'class'     => 'old',
            'published' => true,
        ]);

        // factory(\Model\Category\ModelName::class, 10)->create();
    }
}
