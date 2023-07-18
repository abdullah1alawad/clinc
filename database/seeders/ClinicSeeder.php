<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clinics')->insert(['name'=>'hi']);
        DB::table('clinics')->insert(['name'=>'hi two']);
        DB::table('clinics')->insert(['name'=>'hi three']);
    }
}
