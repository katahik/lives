<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->dateTime('date');
            $table->string('venue');
            $table->string('category');
            $table->string('artist');
            $table->unsignedMediumInteger('min_price');
            $table->unsignedMediumInteger('max_price');
            $table->string('url')->nullable();
//            緯度経度は概算距離1m単位で算定するため、以下の桁数をとる
            $table->double('lat', 7, 5);
            $table->double('lng',8,5);
//            admin_idは必須とする（もし、APIなどによるデータの取得であっても、なんらかの値をいれる）
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lives');
    }
}
