<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('bagian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_bagian', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::dropIfExists('bagian');
    }
}
