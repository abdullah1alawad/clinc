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
        DB::table('diseases')->insert(['patient_id'=>28,'name'=>'cancer']);
        DB::table('diseases')->insert(['patient_id'=>30,'name'=>'cohg']);
        DB::table('diseases')->insert(['patient_id'=>31,'name'=>'i dont know']);
    }
}
