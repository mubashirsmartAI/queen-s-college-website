<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Modern Nursing Lab',
                'description' => 'State-of-the-art nursing laboratory equipped with advanced medical simulation equipment, patient mannequins, and modern medical devices for hands-on practical training.',
                'icon' => 'fas fa-stethoscope',
                'image' => 'facilities/nursing-lab.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Medical Library',
                'description' => 'Comprehensive medical library with extensive collection of nursing books, medical journals, research papers, and digital resources for academic excellence.',
                'icon' => 'fas fa-book',
                'image' => 'facilities/medical-library.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Computer Lab',
                'description' => 'Modern computer laboratory with high-speed internet, latest software, and digital learning resources for nursing informatics and research.',
                'icon' => 'fas fa-laptop',
                'image' => 'facilities/computer-lab.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Clinical Training Center',
                'description' => 'Advanced clinical training facility with realistic hospital settings, patient care simulation, and hands-on clinical experience for students.',
                'icon' => 'fas fa-hospital',
                'image' => 'facilities/clinical-center.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Student Hostel',
                'description' => 'Comfortable and secure student accommodation with modern amenities, study areas, and recreational facilities for outstation students.',
                'icon' => 'fas fa-bed',
                'image' => 'facilities/student-hostel.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Cafeteria',
                'description' => 'Clean and hygienic cafeteria serving nutritious meals, snacks, and beverages for students and faculty with modern dining facilities.',
                'icon' => 'fas fa-utensils',
                'image' => 'facilities/cafeteria.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Auditorium',
                'description' => 'Spacious auditorium with modern audio-visual equipment for seminars, conferences, workshops, and academic presentations.',
                'icon' => 'fas fa-microphone',
                'image' => 'facilities/auditorium.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Sports Complex',
                'description' => 'Well-equipped sports complex with indoor and outdoor facilities for physical fitness, sports activities, and recreational programs.',
                'icon' => 'fas fa-dumbbell',
                'image' => 'facilities/sports-complex.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Research Center',
                'description' => 'Advanced research facility with modern equipment for nursing research, data analysis, and academic publications.',
                'icon' => 'fas fa-flask',
                'image' => 'facilities/research-center.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Administrative Block',
                'description' => 'Modern administrative building housing offices, meeting rooms, and support services for efficient college management.',
                'icon' => 'fas fa-building',
                'image' => 'facilities/admin-block.jpg',
                'is_active' => true,
            ],
        ];
        
        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
        
        $this->command->info('Facilities created successfully!');
    }
}
