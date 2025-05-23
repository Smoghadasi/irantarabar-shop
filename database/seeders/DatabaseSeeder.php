<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin'], // رئیس
            ['id' => 2, 'name' => 'Owner'], // فروشنده
            ['id' => 3, 'name' => 'HUMAN'], // خریدار
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
