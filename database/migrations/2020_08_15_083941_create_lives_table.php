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
            $table->date('date');
            $table->string('venue');
//            該当のカテゴリーがなかった場合のために「指定しない」をデフォルトとした。
//            指定しないを選んだときにvalueはnullとなるためnullを許容する。
            $table->string('category')->nullable();
            $table->string('artist');
            $table->unsignedMediumInteger('min_fee');
            $table->unsignedMediumInteger('max_fee');
            $table->string('url')->nullable();
//            緯度経度は概算距離11cm単位で算定するため、以下の桁数をとる
            $table->double('lat', 8, 6);
            $table->double('lng',9,6);
//            user_idは必須とする（もし、APIなどによるデータの取得であっても、なんらかの値をいれる）
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
