<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\Menu\ModelName::truncate();
        \Model\Menu\ModelName::create([
            'id'        => 1,
            'parent_id' => null,
            'code'		=> 'main',
            'name'    => 'Главная',
            'url'		=> 'http://gls.dev',
            'order' 	=> 1,
        ]);

        \Model\Menu\ModelName::create([
            'id'        => 2,
            'parent_id' => null,
            'code'		=> 'main',
            'name'      => 'Заказы',
            'url'		=> 'http://orders.dev',
            'order' 	=> 2,
        ]);

 
    }
}
