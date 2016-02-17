<?php

use Illuminate\Database\Seeder;

class MediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Model\MediaCategory\ModelName::truncate();
        
        \Model\MediaCategory\ModelName::create([
            'id'        => 2,
            'name'      => 'Телеберүүлөр',
            'nameRu'     => 'Телепередачи',
            'videoType'     => 'tele',
            'published' => true,
        ]);

        \Model\MediaCategory\ModelName::create([
            'id'        => 3,
            'name'      => 'Жаңылыктар',
            'nameRu'     => 'Новости',
            'videoType'     => 'news',
            'published' => true,
        ]);

        \Model\MediaCategory\ModelName::create([
            'id'        => 4,
            'name'      => 'Маанайшат',
            'nameRu'     => 'Развлекательные',
            'videoType'     => 'maanai',
            'published' => true,
        ]);

        \Model\MediaCategory\ModelName::create([
            'id'        => 5,
            'name'      => 'Спорт',
            'nameRu'     => 'Спорт',
            'videoType'     => 'sport',
            'published' => true,
        ]);

        \Model\MediaCategory\ModelName::create([
            'id'        => 6,
            'name'      => 'Элдик репортер',
            'nameRu'     => 'Народный репортер',
            'videoType'     => 'reporter',
            'published' => true,
        ]);
    }
}

