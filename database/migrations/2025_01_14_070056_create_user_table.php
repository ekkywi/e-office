<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username', 255)->unique();
            $table->string('password');
            $table->string('nama', 255);
            $table->string('no_pegawai', 255)->unique();
            $table->string('email', 255)->nullable()->unique();
            $table->uuid('divisi_id');
            $table->uuid('bagian_id');
            $table->uuid('jabatan_id');
            $table->string('token', 60)->unique();
            $table->boolean('status_aktivasi')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');
            $table->foreign('bagian_id')->references('id')->on('bagian')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
