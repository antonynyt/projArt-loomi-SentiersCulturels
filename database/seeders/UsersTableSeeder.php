<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        // Create admin user
        $admin = User::create([
            'pseudo' => 'admin',
            'organization' => null,
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'phone' => null,
            'email' => 'admin@sentiers-culturels-vaud.ch',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('role_user')->insert([
            'role_id' => DB::table('roles')->where('role', 'admin')->value('id'),
            'user_id' => $admin->id,
        ]);

        // Create an editor for thh HEIG-VD
	    $heig = User::create([
            'pseudo' => 'heig',
            'organization' => 'HEIG-VD',
            'firstname' => 'Sarah',
            'lastname' => 'Turin Studach',
            'phone' => '+41 24 557 64 74',
            'email' => 'sarah.turinstudach@heig-vd.ch',
            'email_verified_at' => now(),
            'password' => Hash::make('heig'),
            'remember_token' => Str::random(10),
        ]);
        $IdRoleEditor = DB::table('roles')->where('role', 'editor')->value('id');
        DB::table('role_user')->insert([
            'role_id' => $IdRoleEditor,
            'user_id' => $heig->id,
        ]);

        // Create editor
	    $editors = User::factory()->organization()->count(20)->create();
        foreach ($editors as $editor) {
            DB::table('role_user')->insert([
                'role_id' => $IdRoleEditor,
                'user_id' => $editor->id,
            ]);
        }

        // Create user
	    $users = User::factory()->count(20)->create();
        $IdRoleUser = DB::table('roles')->where('role', 'user')->value('id');
        foreach ($users as $user) {
            DB::table('role_user')->insert([
                'role_id' => $IdRoleUser,
                'user_id' => $user->id,
            ]);
        }
    }
}
