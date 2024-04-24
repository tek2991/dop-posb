<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RegionSeeder::class,
            DivisionSeeder::class,
            OfficeTypeSeeder::class,
            OfficeSeeder::class,
            RoleSeeder::class,
            FinancialYearSeeder::class,
        ]);

        // Create admin user
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
        ]);

        $adminRole = \App\Models\Role::where('name', 'admin')->first();

        $admin->update(['role_id' => $adminRole->id]);
    }
}
