<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Diploma in General Nursing',
                'description' => 'A comprehensive 3-year diploma program that provides students with the knowledge and skills needed to become registered nurses. This program covers all aspects of nursing care including medical-surgical nursing, community health, and patient care.',
                'duration' => '3 Years',
                'fee' => 150000.00,
                'eligibility' => 'Matriculation (10th Grade) with minimum 50% marks',
                'image' => 'slider/nursing-student.webp',
                'is_active' => true,
            ],
            [
                'title' => 'Bachelor of Science in Nursing (BSN)',
                'description' => 'A 4-year degree program that prepares students for advanced nursing practice. The program includes theoretical knowledge, clinical practice, and research methodology.',
                'duration' => '4 Years',
                'fee' => 200000.00,
                'eligibility' => 'Intermediate (12th Grade) with Science subjects and minimum 60% marks',
                'image' => 'slider/college-campus.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Post Graduate Diploma in Nursing',
                'description' => 'A specialized 1-year program for registered nurses who want to advance their careers in specific areas of nursing practice.',
                'duration' => '1 Year',
                'fee' => 100000.00,
                'eligibility' => 'BSc Nursing or equivalent degree',
                'image' => 'slider/medical-lab.jpeg',
                'is_active' => true,
            ],
            [
                'title' => 'Community Health Nursing',
                'description' => 'A specialized program focusing on community health, public health nursing, and health promotion in community settings.',
                'duration' => '2 Years',
                'fee' => 120000.00,
                'eligibility' => 'Matriculation with minimum 50% marks',
                'image' => 'slider/clinical-training.jpeg',
                'is_active' => true,
            ],
            [
                'title' => 'Midwifery Program',
                'description' => 'A specialized program for maternal and child health nursing, focusing on prenatal, delivery, and postnatal care.',
                'duration' => '2 Years',
                'fee' => 130000.00,
                'eligibility' => 'Matriculation with minimum 50% marks',
                'image' => 'slider/library.jpeg',
                'is_active' => true,
            ],
            [
                'title' => 'Critical Care Nursing',
                'description' => 'Advanced program for intensive care unit nursing, emergency care, and critical patient management.',
                'duration' => '1 Year',
                'fee' => 80000.00,
                'eligibility' => 'Diploma in Nursing or BSc Nursing',
                'image' => 'slider/nursing-student.webp',
                'is_active' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
