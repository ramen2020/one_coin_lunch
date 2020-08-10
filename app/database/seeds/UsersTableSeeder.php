<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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
        // 外部キー制約無視
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        User::create([
            'name' => 'test1234',
            'email' => 'test1234@test.com',
            'introduction' => "テストユーザーです。",
            'profile_image' => "test.jpg",
            'password' => \Hash::make('testtest')
        ]);

        factory(User::class, 5)->create();

        //　外部制約キーの変数を戻す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
