<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diseases')->insert(['patient_id'=>1,'name'=>'cancer']);
        DB::table('diseases')->insert(['patient_id'=>2,'name'=>'cohg']);
        DB::table('diseases')->insert(['patient_id'=>3,'name'=>'i dont know']);
    }
}
