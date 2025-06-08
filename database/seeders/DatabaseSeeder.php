<?php

namespace Database\Seeders;

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
        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',
                'display_name' => 'رئیس',
                'guard_name' => 'web'
            ],
            [
                'id' => 2,
                'name' => 'Owner',
                'display_name' => 'فروشنده',
                'guard_name' => 'web'
            ],
            [
                'id' => 3,
                'name' => 'HUMAN',
                'display_name' => 'خریدار',
                'guard_name' => 'web'
            ],
        ];

        Role::insert($roles);

        $user = User::factory()->create([
            'name' => 'صدرا',
            'lastName' => 'مقدسی',
            'mobileNumber' => '09036866949',
            'email' => 'sadra@gmail.com',
            'status' => 1,
            'password' => bcrypt('123123123'),
        ]);

        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            $user->roles()->sync([$adminRole->id]);
        }
    }
}
