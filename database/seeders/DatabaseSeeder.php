<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AllowedBranch;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'), // Use bcrypt() instead of Hash::make()
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }

        $customers = [
            [
                'firstname' => 'Customer',
                'lastname' => 'One',
                'email' => 'customer1@bluebox.com',
                'branch' => 'Bluebox Partners'
            ]
        ];

        foreach ($customers as $customer){
            Customer::create($customer);
        }

        $branches =
            [
                ['branches' =>'bluebox'],
                ['branches' =>'Family1'],
                ['branches' =>'Family2'],
                ['branches' =>'Family3'],
                ['branches' =>'Family4 '],
            ];

        foreach ($branches as $branch){
            AllowedBranch::create($branch);
        }

    }
}
