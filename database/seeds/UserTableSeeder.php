<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Model\User\ModelName::truncate();
        \Model\User\ModelName::create([
            'name'       => 'Cngz Bg',
            'email'      => 'nurchin@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 1,
        ]);
        \Model\User\ModelName::create([
            'name'       => 'Abakan',
            'email'      => 'abakano21@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 1,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Eldos',
            'email'      => 'eldos@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 1,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Aibek',
            'email'      => 'aibek@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 1,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Nurzat',
            'email'      => 'nurzatnew@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 1,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Ainura',
            'email'      => 'ainura.niazova@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Gulshat',
            'email'      => 'gulshatimanahunova@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Dinara',
            'email'      => 'public.relations.ktrk@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Mira',
            'email'      => 'alimova-mira@mail.ru',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Azamat',
            'email'      => 'nsmanager@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'ns',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Aigerim',
            'email'      => 'aigera.250990@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
            'channel_id' => 2,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Usubaly',
            'email'      => 'usubaly.mambetov@gmail.com',
            'password'   => bcrypt('usubaly123'),
            'role'       => 'birinchi',
            'channel_id' => 7,
        ]);

          \Model\User\ModelName::create([
            'name'       => 'Bektur',
            'email'      => 'bektur_ods@mail.ru',
            'password'   => bcrypt('bektur123'),
            'role'       => 'muzkanal',
            'channel_id' => 3,
        ]);
        //factory(\Model\User\ModelName::class, 50)->create();
    }
}
