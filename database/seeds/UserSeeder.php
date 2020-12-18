<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=factory(\App\User::class,5)->create();
        $user=$users[0];
        $user->name='张三';
        $user->email="wdsj002@126.com";
        $user->save();

    }
}
