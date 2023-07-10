<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'=>'abdullah_alawad_',
            'fname'=>'abdullah',
            'mname'=>'firas',
            'lname'=>'alawad',
            'mother_name'=>'bayan',
            'birth_date'=>'2001/6/29',
            'birth_location'=>'hama',
            'national_id'=>'1234567',
            'constraint'=>'taybat',
            'gender'=>0,
            'address'=>'barazil',
            'sieve'=>1,
            'phone'=>'0957275976',
            'password'=>'12345678',
        ]);
    }
}
