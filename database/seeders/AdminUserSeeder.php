<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $password = env('ADMIN_PASSWORD', 'secret123');

        $user = User::where('email', $email)->first();

        if (!$user) {
            User::create([
                'name' => 'Admin',
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]);
        } else {
            // Ensure password is known in case of reset
            $user->update([
                'password' => Hash::make($password),
                'email_verified_at' => $user->email_verified_at ?? now(),
            ]);
        }
    }
}