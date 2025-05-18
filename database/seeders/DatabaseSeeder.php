<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //   Créer les rôles s'ils n'existent pas
        $adminRole = Role::firstOrCreate(['name' => 'administrateur']);
        $clientRole = Role::firstOrCreate(['name' => 'client']);

        //   Créer un administrateur
        $admin = User::firstOrCreate(
            ['email' => 'aithmadsoufiane7@gmail.com'],
            [
                'name' => 'Admin OneClick',
                'password' => Hash::make('admin1234'),
            ]
        );
        $admin->assignRole($adminRole);

        //   Créer un utilisateur client
        $client = User::firstOrCreate(
            ['email' => 'User@gmail.com'],
            [
                'name' => 'Client Demo',
                'password' => Hash::make('client1234'),
            ]
        );
        $client->assignRole($clientRole);
    }
}
