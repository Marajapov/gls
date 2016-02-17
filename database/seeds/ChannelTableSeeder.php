<?php

use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\Channel\ModelName::truncate();

        \Model\Channel\ModelName::create([
            'id'        => 1,
            'name'      => 'general',
            'display'   => 'Общий',
            'file'       => 'images/logo_notext.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 2,
            'name'      => 'ktrk',
            'display'   => 'КТРК',
            'file'       => 'img/icons/2.svg',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 3,
            'name'      => 'muzkanal',
            'display'   => 'Музыка',
            'file'       => 'img/icons/3.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 4,
            'name'      => 'balastan',
            'display'   => 'Баластан',
            'file'       => 'img/icons/4.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 5,
            'name'      => 'madaniyat',
            'display'   => 'Маданият',
            'file'       => 'img/icons/5.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 6,
            'name'      => 'kyrgyzradio',
            'display'   => 'Кыргыз Радио',
            'file'       => 'img/icons/6.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 7,
            'name'      => 'birinchi',
            'display'   => 'Биринчи Радио',
            'file'       => 'img/icons/7.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 8,
            'name'      => 'dostuk',
            'display'   => 'Достук',
            'file'       => 'img/icons/8.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 9,
            'name'      => 'minkiyal',
            'display'   => 'Мин Кыял',
            'file'       => 'img/icons/9.png',
            'published' => true,
        ]);

        \Model\Channel\ModelName::create([
            'id'        => 10,
            'name'      => 'baldar',
            'display'   => 'Балдар',
            'published' => true,
        ]);
    }
}
