<div class="container">
    <h1>Notifications</h1>

    @if ($notifications->count() > 0)
        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item">
                    <strong>{{ $notification->title }}</strong>
                    <p>{{ $notification->body }}</p>

                    @if (!$notification->is_read)
                        <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Mark as Read</button>
                        </form>
                    @else
                        <span class="badge bg-success">Read</span>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- Pagination Links -->
        {{ $notifications->links() }}
    @else
        <p>No notifications yet.</p>
    @endif
</div>
