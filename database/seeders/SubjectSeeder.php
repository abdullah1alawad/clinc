<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert(['name'=>'take out']);
        DB::table('subjects')->insert(['name'=>'take in']);
        DB::table('subjects')->insert(['name'=>'take off']);
        DB::table('subjects')->insert(['name'=>'take on']);
    }
}
