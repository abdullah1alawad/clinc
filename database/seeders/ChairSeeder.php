<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chairs')->insert(['clinic_id'=>1]);
        DB::table('chairs')->insert(['clinic_id'=>1]);
        DB::table('chairs')->insert(['clinic_id'=>1]);
        DB::table('chairs')->insert(['clinic_id'=>2]);
        DB::table('chairs')->insert(['clinic_id'=>2]);
        DB::table('chairs')->insert(['clinic_id'=>2]);
        DB::table('chairs')->insert(['clinic_id'=>3]);
        DB::table('chairs')->insert(['clinic_id'=>3]);
        DB::table('chairs')->insert(['clinic_id'=>3]);
    }
}
