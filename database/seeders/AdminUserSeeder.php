<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@queenscollege.edu.pk'],
            [
                'name' => 'Admin User',
                'email' => 'admin@queenscollege.edu.pk',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        // Update password if user already exists
        if (!$admin->wasRecentlyCreated) {
            $admin->password = Hash::make('admin123');
            $admin->save();
        }

        // Create principal admin user
        $principal = User::firstOrCreate(
            ['email' => 'principal@queenscollege.edu.pk'],
            [
                'name' => 'Professor Ghulam Rasool Soomro',
                'email' => 'principal@queenscollege.edu.pk',
                'password' => Hash::make('principal123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        // Update password if user already exists
        if (!$principal->wasRecentlyCreated) {
            $principal->password = Hash::make('principal123');
            $principal->save();
        }

        // Create admissions admin user
        $admissions = User::firstOrCreate(
            ['email' => 'admissions@queenscollege.edu.pk'],
            [
                'name' => 'Admissions Office',
                'email' => 'admissions@queenscollege.edu.pk',
                'password' => Hash::make('admissions123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        // Update password if user already exists
        if (!$admissions->wasRecentlyCreated) {
            $admissions->password = Hash::make('admissions123');
            $admissions->save();
        }

        $this->command->info('Admin users created successfully!');
        $this->command->info('');
        $this->command->info('=== ADMIN CREDENTIALS ===');
        $this->command->info('Main Admin:');
        $this->command->info('  Email: admin@queenscollege.edu.pk');
        $this->command->info('  Password: admin123');
        $this->command->info('');
        $this->command->info('Principal:');
        $this->command->info('  Email: principal@queenscollege.edu.pk');
        $this->command->info('  Password: principal123');
        $this->command->info('');
        $this->command->info('Admissions:');
        $this->command->info('  Email: admissions@queenscollege.edu.pk');
        $this->command->info('  Password: admissions123');
        $this->command->info('');
        $this->command->info('Login URL: /admin/login');
    }
}
