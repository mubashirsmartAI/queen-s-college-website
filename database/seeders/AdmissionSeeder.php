<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admission;
use App\Models\Course;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get available courses
        $courses = Course::all();
        
        if ($courses->isEmpty()) {
            $this->command->info('No courses found. Please run CourseSeeder first.');
            return;
        }
        
        $admissions = [
            [
                'name' => 'Aisha Khan',
                'email' => 'aisha.khan@email.com',
                'phone' => '+92-300-1234567',
                'course' => $courses->random()->title,
                'message' => 'I am very interested in pursuing nursing as my career. I have always wanted to help people and make a difference in healthcare.',
                'status' => 'pending',
            ],
            [
                'name' => 'Muhammad Ali',
                'email' => 'muhammad.ali@email.com',
                'phone' => '+92-301-2345678',
                'course' => $courses->random()->title,
                'message' => 'I have completed my intermediate in pre-medical and want to continue my education in nursing.',
                'status' => 'approved',
            ],
            [
                'name' => 'Fatima Ahmed',
                'email' => 'fatima.ahmed@email.com',
                'phone' => '+92-302-3456789',
                'course' => $courses->random()->title,
                'message' => 'I am passionate about healthcare and want to become a professional nurse.',
                'status' => 'pending',
            ],
            [
                'name' => 'Hassan Raza',
                'email' => 'hassan.raza@email.com',
                'phone' => '+92-303-4567890',
                'course' => $courses->random()->title,
                'message' => 'I have been working as a healthcare assistant and want to advance my career by becoming a registered nurse.',
                'status' => 'rejected',
            ],
            [
                'name' => 'Sara Khan',
                'email' => 'sara.khan@email.com',
                'phone' => '+92-304-5678901',
                'course' => $courses->random()->title,
                'message' => 'I am a recent graduate and want to pursue nursing as my profession.',
                'status' => 'approved',
            ],
            [
                'name' => 'Ahmed Hassan',
                'email' => 'ahmed.hassan@email.com',
                'phone' => '+92-305-6789012',
                'course' => $courses->random()->title,
                'message' => 'I have completed my FSc in pre-medical and want to join the nursing program.',
                'status' => 'pending',
            ],
            [
                'name' => 'Zainab Ali',
                'email' => 'zainab.ali@email.com',
                'phone' => '+92-306-7890123',
                'course' => $courses->random()->title,
                'message' => 'I am interested in the nursing program and want to contribute to healthcare in Pakistan.',
                'status' => 'approved',
            ],
            [
                'name' => 'Usman Khan',
                'email' => 'usman.khan@email.com',
                'phone' => '+92-307-8901234',
                'course' => $courses->random()->title,
                'message' => 'I want to pursue a career in nursing and help improve healthcare services.',
                'status' => 'pending',
            ],
        ];
        
        foreach ($admissions as $admission) {
            Admission::create($admission);
        }
        
        $this->command->info('Admission applications created successfully!');
    }
}
