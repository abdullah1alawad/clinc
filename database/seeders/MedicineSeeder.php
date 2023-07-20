<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert(['patient_id'=>1,'name'=>'panadol']);
        DB::table('medicines')->insert(['patient_id'=>2,'name'=>'cetmol']);
        DB::table('medicines')->insert(['patient_id'=>3,'name'=>'merge']);
    }
}
