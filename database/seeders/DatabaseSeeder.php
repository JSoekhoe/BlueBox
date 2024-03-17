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

        $roles = [
            ['role_name' => 'admin'],
            ['role_name' => 'moderator'],
            ['role_name' => 'Employee'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Retrieve the branch ID for the admin user
        $blueboxPartnersId = AllowedBranch::where('branch_name', 'Bluebox Partners')->first()->id;

        // Retrieve the role ID for the admin user
        $adminId = Role::where('role_name', 'admin')->first()->id;

        $users = [
            [
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'branch_id' => $blueboxPartnersId,
                'role_id' => $adminId,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
