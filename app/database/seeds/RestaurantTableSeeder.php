<?php

use App\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTableSeeder extends Seeder
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

        // DB::table('restaurants')->truncate();

        factory(Restaurant::class, 15)->create();

        //　外部制約キーの変数を戻す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
