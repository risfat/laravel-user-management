<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create admin user (you)
        $admin = User::create([
            'name' => 'MD Risfat Amin',
            'email' => 'risfat.bd@gmail.com',
            'password' => Hash::make('password'),
            'first_name' => 'MD Risfat',
            'last_name' => 'Amin',
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'zip_code' => $faker->postcode,
            'date_of_birth' => $faker->date('Y-m-d', '-18 years'),
            'gender' => 'male',
            'bio' => $faker->paragraph,
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Administrator');

        // Get all roles except administrator
        $roles = Role::where('name', '!=', 'administrator')->pluck('name')->toArray();

        // Create 20 random users
        User::factory(20)->create()->each(function ($user) use ($roles, $faker) {
            // Randomly assign a role to each user
            $randomRole = $roles[array_rand($roles)];
            $user->assignRole($randomRole);

            // Update user with additional attributes
            $user->update([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'zip_code' => $faker->postcode,
                'date_of_birth' => $faker->date('Y-m-d', '-18 years'),
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'bio' => $faker->paragraph,
                'status' => $faker->boolean(80), // 80% chance of being active
                'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        });
    }
}
