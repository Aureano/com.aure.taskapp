<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Service;
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

        Service::create([
             'nom'=>'Comptablité',
             'description'=>'Ici, on se consacre à la gestion des entrées/sorties de la société.' ,
             'chef'=>'Mr Jordan ATINDEHOU'
        ]);

        Service::create([
            'nom'=>'Informatique',
            'description'=>'Ici, on se consacre à la conception ou la mise en place de solutions informatiques des entrées/sorties de la société.',
            'chef'=>'Mme Sarah FANOU'
       ]);

       Service::create([
            'nom'=>'Marketing',
            'description'=>"Ici, on se consacre à la prise d'informations et à la recherche de contrats ou de marchés pour la société.",
            'chef'=>'Mr Daniel ALOUKO'
       ]);

       Service::create([
        'nom'=>'Direction Générale',
        'description'=>'Ici, se situe la base même de la société. En gros la direction chargé de veiller à la bonne marche de la société',
        'chef'=>'Mr Maurice Comlan'
       ]);

        $admin= User::create([
            'name' =>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make ('password'),
            'service_id'=>'4'
        ]);

        $create= User::create([
            'name' =>'create',
            'email'=>'create@gmail.com',
            'password'=>Hash::make ('password'),
            'service_id'=>'3'
        ]);

        $user= User::create([
            'name' =>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make ('password'),
            'service_id'=>'3'
        ]);
        $admin->roles()->attach([1,2]);
        $create->roles()->attach([2]);
        $user->roles()->attach([3]);


    }
}
