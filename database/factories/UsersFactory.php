<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Roles;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    protected static ?string $password; ///aqui é gerado password
                                        ///protected => acessivel somente aqui dentro
                                        ///static (fixo, pode ser usado por qlqr instancia da classe)
                                        ///"?string" pode ser null ou string
                                        /// atribuido a $password
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => fake()->name(),
            'lastName' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mailVerifiedAt' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'id_role' => Roles::where('id', 6)->pluck('id')->first(),
            'remember_token' => Str::random(10),
            
        ];
    }
}
