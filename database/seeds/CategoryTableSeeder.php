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
            'title'     => 'Саясат жана коом',
            'titleRu'      => 'Политика и общество',
            'order'     => 1,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 2,
            'title'     => 'Экономика жана бизнес',
            'titleRu'      => 'Экономика и бизнес',
            'order'     => 2,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 3,
            'title'     => 'Музыка жана чыгармачылык',
            'titleRu'      => 'Музыка и выступления',
            'order'     => 3,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 4,
            'title'     => 'Илим жана билим',
            'titleRu'      => 'Наука и образование',
            'order'     => 4,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 5,
            'title'     => 'Айыл чарба',
            'titleRu'      => 'Сельское хозяйство',
            'order'     => 5,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 6,
            'title'     => 'Маданият',
            'titleRu'      => 'Культура',
            'order'     => 6,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 7,
            'title'     => 'Спорт',
            'titleRu'      => 'Спорт',
            'order'     => 7,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 8,
            'title'     => 'Ден соолук',
            'titleRu'      => 'Здоровье',
            'order'     => 8,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 9,
            'title'     => 'Балдар',
            'titleRu'      => 'Дети',
            'order'     => 9,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 10,
            'title'     => 'Интернет жана технологиялар',
            'titleRu'      => 'Интернет и технологии',
            'order'     => 10,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 11,
            'title'     => 'Коргонуу жана коопсуздук',
            'titleRu'      => 'Оборона и безопасность',
            'order'     => 11,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 12,
            'title'     => 'Коррупция',
            'titleRu'      => 'Коррупция',
            'order'     => 12,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 13,
            'title'     => 'Кылмыш',
            'titleRu'      => 'Происшествия',
            'order'     => 13,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 14,
            'title'     => 'Дин',
            'titleRu'      => 'Религия',
            'order'     => 14,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 15,
            'title'     => 'Аналитика',
            'titleRu'      => 'Аналитика',
            'order'     => 15,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 16,
            'title'     => 'Аймактык жаңылыктар',
            'titleRu'      => 'Граница',
            'order'     => 16,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 17,
            'title'     => 'Чек ара',
            'titleRu'      => 'Региональные новости',
            'order'     => 17,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 18,
            'title'     => 'Экология',
            'titleRu'      => 'Экология',
            'order'     => 18,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 19,
            'title'     => 'Туризм',
            'titleRu'      => 'Туризм',
            'order'     => 19,
            'published' => true,
        ]);

        \Model\Category\ModelName::create([
            'id'        => 20,
            'title'     => 'Укук коргоо',
            'titleRu'      => 'Право',
            'order'     => 20,
            'published' => true,
        ]);

        // factory(\Model\Category\ModelName::class, 10)->create();
    }
}
