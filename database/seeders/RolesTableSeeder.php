<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        Role::create(['role' => 'admin']);
        Role::create(['role' => 'editor']);
        Role::create(['role' => 'user']);
    }
}
