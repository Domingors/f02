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
            'name'=>'SC',
            'email'=>'santacruz@1.es',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'id'=>20,
            'name'=>'GC',
            'email'=>'grancanaria@1.es',
            'password'=>bcrypt('12345678')
        ]);
    }
}
