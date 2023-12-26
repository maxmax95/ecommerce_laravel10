<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////PRIMEIRO INSERT ADMINISTRATIVO
        $admin = Roles::create([
            'roleName' => 'admin',
            'id_parent' => null,
        ]);
        
        $gerente = Roles::create([
            'roleName' => 'manager',
            'id_parent' => 1,
        ]);

        $stock = Roles::create([
            'roleName' => 'stock',
            'id_parent' => 1,
        ]);

        $sales = Roles::create([
            'roleName' => 'sales',
            'id_parent' => 1,
        ]);

        $salesMan = Roles::create([
            'roleName' => 'salesMan',
            'id_parent' => $sales->id,
        ]);

        $costumer = Roles::create([
            'roleName' => 'costumer',
            'id_parent' => $sales->id,
            
        ]);
        
        
    }
}
