<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed data for Divisi
        DB::table('divisi')->insert([
            ['id' => (string) Str::uuid(), 'nama_divisi' => 'System Administrator'],
        ]);

        // Seed data for Bagian
        DB::table('bagian')->insert([
            ['id' => (string) Str::uuid(), 'nama_bagian' => 'System Administrator'],
        ]);

        // Seed data for Jabatan
        DB::table('jabatan')->insert([
            ['id' => (string) Str::uuid(), 'nama_jabatan' => 'System Administrator'],
        ]);
    }
}
