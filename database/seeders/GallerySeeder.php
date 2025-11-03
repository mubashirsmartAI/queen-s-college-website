<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'College Campus View',
                'description' => 'Beautiful view of Queen\'s College campus with modern facilities and green surroundings.',
                'image' => 'gallery/campus-view.jpg',
                'category' => 'campus',
                'is_active' => true,
            ],
            [
                'title' => 'Nursing Lab',
                'description' => 'State-of-the-art nursing laboratory equipped with modern medical equipment for practical training.',
                'image' => 'gallery/nursing-lab.jpg',
                'category' => 'facilities',
                'is_active' => true,
            ],
            [
                'title' => 'Graduation Ceremony 2024',
                'description' => 'Annual graduation ceremony celebrating the achievements of our nursing graduates.',
                'image' => 'gallery/graduation-2024.jpg',
                'category' => 'events',
                'is_active' => true,
            ],
            [
                'title' => 'Clinical Training Session',
                'description' => 'Students participating in hands-on clinical training under expert supervision.',
                'image' => 'gallery/clinical-training.jpg',
                'category' => 'students',
                'is_active' => true,
            ],
            [
                'title' => 'Library Interior',
                'description' => 'Well-stocked library with medical and nursing books, journals, and digital resources.',
                'image' => 'gallery/library-interior.jpg',
                'category' => 'facilities',
                'is_active' => true,
            ],
            [
                'title' => 'Faculty Meeting',
                'description' => 'Faculty members discussing academic programs and student development strategies.',
                'image' => 'gallery/faculty-meeting.jpg',
                'category' => 'faculty',
                'is_active' => true,
            ],
            [
                'title' => 'Student Activities',
                'description' => 'Students engaged in various extracurricular activities and community service programs.',
                'image' => 'gallery/student-activities.jpg',
                'category' => 'activities',
                'is_active' => true,
            ],
            [
                'title' => 'Award Ceremony',
                'description' => 'Recognition ceremony for outstanding students and faculty achievements.',
                'image' => 'gallery/award-ceremony.jpg',
                'category' => 'awards',
                'is_active' => true,
            ],
            [
                'title' => 'Medical Equipment',
                'description' => 'Modern medical equipment and simulation tools used in nursing education.',
                'image' => 'gallery/medical-equipment.jpg',
                'category' => 'facilities',
                'is_active' => true,
            ],
            [
                'title' => 'Student Study Group',
                'description' => 'Students collaborating in study groups to enhance their learning experience.',
                'image' => 'gallery/study-group.jpg',
                'category' => 'students',
                'is_active' => true,
            ],
        ];
        
        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
        
        $this->command->info('Gallery items created successfully!');
    }
}
