<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    
    public function __construct()
    {
        $this->run();
    }

    public function run()
    {

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $userAdmin = User::create([
            'username' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'verification_status' => 'verified'
        ]);

        $userAdmin->assignRole('admin');

        $userUser = User::create([
            'phone' => '01323174104',
            'otp' => '123456'
        ]);

        $userUser->assignRole('user');
    }
}
