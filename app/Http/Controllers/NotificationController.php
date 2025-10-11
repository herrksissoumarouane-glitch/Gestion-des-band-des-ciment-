<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display notifications.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $notifications = Notification::where('is_read', false)->latest()->paginate(5);

        if ($request->ajax()) {
            return view('partials.notifications', compact('notifications'));
        }

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Mark a notification as read.
     *
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);

        return redirect()->route('notifications.index')->with('status', 'Notification marked as read.');
    }

    /**
     * Create a notification for a specific user.
     *
     * @param string $username
     * @param string $title
     * @param string $body
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($username, $title, $body)
    {
        // Find the user by username
        $user = User::where('name', $username)->first();

        // If the user does not exist, return an error response
        if (!$user) {
            return response()->json(['message' => 'User not found!'], 404);
        }

        // Create the notification and associate it with the user
        $notification = Notification::create([
            'notifiable_type' => User::class,
            'notifiable_id'   => $user->id,
            'username'        => $username,
            'title'           => $title,
            'body'            => $body,
            'is_read'         => false,
        ]);

        return response()->json($notification, 201); // Return the created notification
    }
}
