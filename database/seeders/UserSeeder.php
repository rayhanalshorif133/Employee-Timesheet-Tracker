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
        Role::create(['name' => 'employee']);

        $userAdmin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $userAdmin->assignRole('admin');

        $employee = User::create([
            'name' => 'Employee 1',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $employee->assignRole('employee');
    }
}
