<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        \Model\User\ModelName::truncate();
        \Model\User\ModelName::create([
            'name'       => 'Cngz Bg',
            'email'      => 'nurchin@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
        ]);
        \Model\User\ModelName::create([
            'name'       => 'Abakan',
            'email'      => 'abakano21@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
        ]);
        \Model\User\ModelName::create([
            'name'       => 'Aibek',
            'email'      => 'aibek@gmail.com',
            'password'   => bcrypt('123123'),
            'role'       => 'admin',
        ]);

          
        //factory(\Model\User\ModelName::class, 50)->create();
    }
}
