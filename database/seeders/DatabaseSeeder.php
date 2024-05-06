<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'admin'
        ]);

        Role::create([
            'name'=>'create'
        ]);

        Role::create([
            'name'=>'users'
        ]);

        $admin= User::create([
            'name' =>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make ('password')
        ]);

        $create= User::create([
            'name' =>'create',
            'email'=>'create@gmail.com',
            'password'=>Hash::make ('password')
        ]);

        $user= User::create([
            'name' =>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make ('password')
        ]);
        $admin->roles()->attach([1,2]);
        $create->roles()->attach([2]);
        $user->roles()->attach([3]);

    }
}
