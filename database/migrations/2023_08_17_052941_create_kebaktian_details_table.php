<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebaktianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebaktian_details', function (Blueprint $table) {
            $table->integer('id_kebaktian');
            $table->integer('penatua');
            $table->integer('laki');
            $table->integer('wanita');
            $table->integer('anak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebaktian_details');
    }
}
