<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        ////////////////////////////////////////
        ////////PRIMEIRO INSERT ADMINISTRATIVO de roles
        
        $this->call([
            RolesSeeder::class,
            
        ]);
        
        ////////////////////////////////////////
        ////////PRIMEIRO INSERT ADMINISTRATIVO de user-admin
        
        $this->call([
        UsersSeeder::class,
        ]);
        
        ////////////////////////////////////////
        ////////factory de categorias
        
        $this->call([
            CategorySeeder::class,
        ]);
        
        //////////////////////////////////////// 
        ////////factory de produtos
        $this->call([
            ProductsSeeder::class,
        ]);   
        ////////////////////////////////////////
    }
}
