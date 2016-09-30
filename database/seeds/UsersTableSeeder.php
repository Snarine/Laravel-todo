<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();
         $users = array(
            array(
                'name' => 'UserName',
                'password' => Hash::make('123123'),
                'email' => 'userEmail@ya.ru'
            ),

            array(
                'name' => 'UserName1',
                'password' => Hash::make('123123'),
                'email' => 'user1Email@ya.ru'
            )
        );
         
        DB::table('users')->insert($users);
    }
}
