<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notifications = [
            [
                'title' => 'Admission Open for Fall 2024',
                'content' => 'Applications are now open for all nursing programs for the Fall 2024 semester. Apply before the deadline of August 15, 2024.',
                'type' => 'admission',
                'publish_date' => Carbon::now()->subDays(5),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'New Scholarship Program Launched',
                'content' => 'Queen\'s College is pleased to announce a new scholarship program for deserving students. Apply now for financial assistance.',
                'type' => 'general',
                'publish_date' => Carbon::now()->subDays(3),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Clinical Training Schedule Updated',
                'content' => 'The clinical training schedule for the current semester has been updated. Please check the new schedule in the student portal.',
                'type' => 'general',
                'publish_date' => Carbon::now()->subDays(1),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Examination Results Published',
                'content' => 'Mid-term examination results have been published. Students can check their results on the college website.',
                'type' => 'exam',
                'publish_date' => Carbon::now()->subDays(2),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Campus Maintenance Notice',
                'content' => 'Scheduled maintenance will be performed on the college library system on Sunday, October 25, 2024, from 9 AM to 5 PM.',
                'type' => 'general',
                'publish_date' => Carbon::now()->subDays(4),
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::create($notification);
        }
    }
}
