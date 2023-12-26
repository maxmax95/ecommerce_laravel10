<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Roles; ///usado para criar seeds com referencia a tb de roles

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = Users::create([
            'firstName' => 'super',
            'lastName' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'id_role' => Roles::where('id', 1)->pluck('id')->first(),
        ]);
        
    }
}
