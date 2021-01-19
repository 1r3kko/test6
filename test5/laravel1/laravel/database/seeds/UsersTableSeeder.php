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
        $data=[
            [
                'name'=>'Автор не известен',
                'email'=>'author_unknown@g.g',
                'password'=>Hash::make(Str::random(16)),
            ],
            [
                'name'=>'Автор',
                'email'=>'author1@g.g',
                'password'=>Hash::make('123123'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
