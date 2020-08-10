<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unsigned()->index();
            $table->unsignedInteger('status')->default(1)->comment('申請中:1、投稿済み:2');
            $table->string('store_name', 50)->comment('店舗名');
            $table->string('store_infomation', 500)->comment('店舗情報');
            $table->unsignedInteger('prefecture_id')->nullable()->comment('都道府県');
            $table->string('city')->nullable()->comment('区市町村');
            $table->string('street_address')->nullable()->comment('番地など');
            $table->string('image_name')->nullable()->comment('画像名');
            $table->unsignedInteger('high_budget')->comment('上限予算');
            $table->unsignedInteger('low_budget')->comment('下限予算');
            $table->double('latitude', 8, 6)->nullable()->comment('緯度');
            $table->double('longitude', 9, 6)->nullable()->comment('経度');
            $table->unsignedInteger('category_id_1')->nullable()->comment('カテゴリID_1');
            $table->unsignedInteger('category_id_2')->nullable()->comment('カテゴリID_2');
            $table->unsignedInteger('category_id_3')->nullable()->comment('カテゴリID_3');
            $table->unsignedInteger('category_id_4')->nullable()->comment('カテゴリID_4');
            $table->unsignedInteger('category_id_5')->nullable()->comment('カテゴリID_5');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
