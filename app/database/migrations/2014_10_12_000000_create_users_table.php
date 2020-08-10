<?php

use function Symfony\Component\String\s;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('twitter_id')->nullable()->comment('twitterのid');
            $table->string('twitter_nickname')->nullable()->comment('twitterの名前');
            $table->string('twitter_avator')->nullable()->comment('twitterの画像');
            $table->string('name')->unique()->comment('名前');
            $table->string('introduction')->comment('自己紹介');
            $table->string('profile_image')->comment('自己紹介');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
