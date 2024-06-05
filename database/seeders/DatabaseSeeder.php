<?php

namespace Database\Seeders;

use App\Models\AllowedBranch;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed branches
        $branches = [
            ['branch_name' => 'Bluebox Partners'],
            ['branch_name' => 'Family1'],
            ['branch_name' => 'Family2'],
            ['branch_name' => 'Family3'],
            ['branch_name' => 'Family4'],
        ];

        foreach ($branches as $branch) {
            AllowedBranch::create($branch);
        }

        // Seed roles
        $roles = [
            ['role_name' => 'admin'],
            ['role_name' => 'moderator'],
            ['role_name' => 'Employee'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Seed users
        $users = [
            [
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'branch_name' => 'Bluebox Partners',
                'role_name' => 'admin',
            ],
            
            [
                'firstname' => 'moderator',
                'lastname' => 'Bluebox',
                'email' => 'Moderator@bluebox.nl',
                'password' => bcrypt('moderator'),
                'branch_name' => 'Bluebox Partners',
                'role_name' => 'moderator',
            ],
            [
                'firstname' => 'moderator',
                'lastname' => 'family1',
                'email' => 'Moderator@family1.nl',
                'password' => bcrypt('moderator'),
                'branch_name' => 'Family1',
                'role_name' => 'moderator',
            ],
            [
                'firstname' => 'employee',
                'lastname' => 'bluebox',
                'email' => 'employee@bluebox.nl',
                'password' => bcrypt('employee'),
                'branch_name' => 'Family1',
                'role_name' => 'moderator',
            ],
            // Add more users as needed
        ];

        foreach ($users as $user) {
            $branchId = AllowedBranch::where('branch_name', $user['branch_name'])->first()->id;
            $roleId = Role::where('role_name', $user['role_name'])->first()->id;

            User::create([
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'password' => $user['password'],
                'branch_id' => $branchId,
                'role_id' => $roleId,
            ]);
        }

        // Seed customers
        $customers = [
            [
                'firstname' => 'test',
                'lastname' => 'bluebox',
                'email' => 'bluebox1@gmail.com',
                'branch_name' => 'Bluebox Partners',
            ],
            [
                'firstname' => 'test',
                'lastname' => 'family1',
                'email' => 'family1@gmail.com',
                'branch_name' => 'Family1',
            ],
            // Add more customers as needed
        ];

        foreach ($customers as $customer) {
            $branchId = AllowedBranch::where('branch_name', $customer['branch_name'])->first()->id;

            Customer::create([
                'firstname' => $customer['firstname'],
                'lastname' => $customer['lastname'],
                'email' => $customer['email'],
                'branch_id' => $branchId,
            ]);
        }
    }
}
