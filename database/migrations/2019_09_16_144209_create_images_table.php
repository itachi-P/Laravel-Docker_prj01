<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->integer('user_id');
            //usersテーブルとの外部キー連結は仮実装
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
