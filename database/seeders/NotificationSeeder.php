<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        // Ensure there's at least one user in the database, or this will fail
        $user = User::first();

        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'testuser@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Create 10 notifications
        for ($i = 1; $i <= 10; $i++) {
            Notification::create([
                'username' => $user->name,
                'title' => 'Notification ' . $i,
                'body' => 'This is the body of notification number ' . $i,
                'is_read' => false,
                'notifiable_type' => User::class,  // Assuming notifications are for a User
                'notifiable_id' => $user->id,  // Associate the notification with the user
            ]);
        }
    }
}
