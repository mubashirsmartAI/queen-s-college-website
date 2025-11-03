<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculty = [
            [
                'name' => 'Professor Ghulam Rasool Soomro',
                'designation' => 'Principal & Founder',
                'qualification' => 'MSc Nursing, PhD in Healthcare Management',
                'experience' => '25+ years in nursing education and healthcare administration',
                'specialization' => 'Nursing Education, Healthcare Management',
                'email' => 'principal@queenscollege.edu.pk',
                'phone' => '0327-3313130',
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Sarah Ahmed',
                'designation' => 'Head of Nursing Department',
                'qualification' => 'PhD in Nursing, MSc in Medical-Surgical Nursing',
                'experience' => '20+ years in clinical nursing and education',
                'specialization' => 'Medical-Surgical Nursing, Critical Care',
                'email' => 'sarah.ahmed@queenscollege.edu.pk',
                'phone' => '0333-2051323',
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Muhammad Hassan',
                'designation' => 'Associate Professor',
                'qualification' => 'PhD in Community Health, MSc in Public Health',
                'experience' => '18+ years in community health and public health nursing',
                'specialization' => 'Community Health Nursing, Public Health',
                'email' => 'muhammad.hassan@queenscollege.edu.pk',
                'phone' => '0300-1234567',
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Ayesha Khan',
                'designation' => 'Assistant Professor',
                'qualification' => 'PhD in Maternal and Child Health, MSc in Midwifery',
                'experience' => '15+ years in maternal and child health nursing',
                'specialization' => 'Maternal and Child Health, Midwifery',
                'email' => 'ayesha.khan@queenscollege.edu.pk',
                'phone' => '0301-2345678',
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Ali Raza',
                'designation' => 'Assistant Professor',
                'qualification' => 'PhD in Mental Health Nursing, MSc in Psychiatric Nursing',
                'experience' => '12+ years in mental health and psychiatric nursing',
                'specialization' => 'Mental Health Nursing, Psychiatric Care',
                'email' => 'ali.raza@queenscollege.edu.pk',
                'phone' => '0302-3456789',
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Fatima Sheikh',
                'designation' => 'Lecturer',
                'qualification' => 'MSc in Pediatric Nursing, BSc in Nursing',
                'experience' => '10+ years in pediatric nursing and child care',
                'specialization' => 'Pediatric Nursing, Child Health',
                'email' => 'fatima.sheikh@queenscollege.edu.pk',
                'phone' => '0303-4567890',
                'is_active' => true,
            ],
        ];

        foreach ($faculty as $member) {
            Faculty::create($member);
        }
    }
}
