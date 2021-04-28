<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'domingo',
            'email'=>'domingors@1.es',
            'password'=>bcrypt('12345678'),
            'is_admin'=>true
        ]);
        User::create([
            'name'=>'Encarna',
            'email'=>'encarna@1.es',
            'password'=>bcrypt('12345678'),
            'is_admin'=>true
        ]);
        User::create([
            'name'=>'Noelia',
            'email'=>'noelia@1.es',
            'password'=>bcrypt('12345678'),
            'is_admin'=>true
        ]);
        User::create([
            'name'=>'antarhes',
            'email'=>'Antarhes@1.es',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'id'=>10,
            'name'=>'Santa Cruz',
            'email'=>'santacruz@1.es',
            'password'=>bcrypt('12345678'),
            'is_jefe'=>true
        ]);
        User::create([
            'id'=>1002,
            'name'=>'Santa Cruz2',
            'email'=>'santacruz@2.es',
            'password'=>bcrypt('12345678'),
            'grupo'=>10
        ]);
        User::create([
            'id'=>1003,
            'name'=>'Santa Cruz3',
            'email'=>'santacruz@3.es',
            'password'=>bcrypt('12345678'),
            'grupo'=>10
        ]);
        User::create([
            'id'=>20,
            'name'=>'Las Palmas',
            'email'=>'laspalmas@1.es',
            'password'=>bcrypt('12345678'),
            'is_jefe'=>true
        ]);
        User::create([
            'id'=>2002,
            'name'=>'Las Palmas2',
            'email'=>'laspalmas@2.es',
            'password'=>bcrypt('12345678'),
            'grupo'=>20
        ]);
        User::create([
            'id'=>2003,
            'name'=>'Las Palmas3',
            'email'=>'laspalmas@3.es',
            'password'=>bcrypt('12345678'),
            'grupo'=>20
        ]);
    }
}
