<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('students')->insert([
        //     'studentname'=>Str::random(10),
        //     'email'=>Str::random(10).'@gmail.com',
        //     'contactno'=>Str::random(),
        //     'dateofbirth'=>Str::random(10),
        //     'gender'=>Str::random(10),
        //     'image'=>Str::random(10),
        //     'password'=>Hash::make(Str::random(10)),
        // ]);

        $faker = Faker::create();
        foreach(range(1,10) as $value){
            
            DB::table('students')->insert([
                'studentname'=>$faker->name(),
                'email'=>$faker->unique()->safeEmail(),
                'contactno'=>$faker->numerify(),
                'dateofbirth'=>$faker->date(),
                
                'password'=>Hash::make($faker->password()),
            ]);
        }
    }
}
