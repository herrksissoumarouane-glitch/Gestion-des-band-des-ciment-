<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Laravel Navbar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* General Navbar Styling */
        .navbar-custom {
            background-color: #fff; /* Clean white background */
            border-bottom: 3px solid #007bff; /* Subtle blue border at the bottom */
            position: relative;
        }

        /* Navbar Links */
        .navbar-custom .nav-link {
            color: #495057; /* Slightly muted gray for links */
            font-weight: 600;
            text-transform: uppercase;
            padding: 15px 20px;
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        /* Navbar Links on Hover */
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #007bff; /* Blue text color on hover */
        }

        /* Active Bar Effect */
        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #007bff; /* Blue active bar */
            transform: scaleX(0); /* Initially hidden */
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out; /* Smooth transition for the underline */
        }

        /* When Hovering or Active, Show the Active Bar */
        .navbar-custom .nav-link:hover::after,
        .navbar-custom .nav-link.active::after {
            transform: scaleX(1); /* Show the underline on hover or active state */
            transform-origin: bottom left; /* Animate from left to right */
        }

        /* Navbar Brand */
        .navbar-custom .navbar-brand {
            color: #495057;
            font-weight: 700;
            font-size: 24px;
        }

        .navbar-custom .navbar-brand:hover {
            color: #007bff; /* Blue for brand text on hover */
        }

        /* Dropdown Menu */
        .navbar-custom .dropdown-menu {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Dropdown Items */
        .navbar-custom .dropdown-item {
            color: #495057;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-custom .dropdown-item:hover {
            color: #007bff;
            background-color: #f8f9fa;
        }

        /* Navbar Toggler Button */
        .navbar-toggler {
            border-color: #007bff;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-custom shadow-lg">
    <div class="container-fluid">
        <!-- Laravel Logo on the Left -->
        <a class="navbar-brand d-flex align-items-center">
            <i class="fas fa-tools text-dark fs-3"></i>
            <span class="ms-2 fs-5 fw-bold text-dark">Builders United</span>
        </a>

        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <!-- Table -->
                @if(auth()->check() && (auth()->user()->role === '1' || auth()->user()->role === '2'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('table') ? 'active' : '' }}" href="{{ route('table') }}" data-turbo-action="replace">
                        <i class="fas fa-tachometer-alt"></i> {{ __('Table de Board') }}
                    </a>
                </li>
                @endif

                <!-- Administrations (Visible for specific roles) -->
                @if(auth()->check() && (auth()->user()->role === '1' || auth()->user()->role === '2'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('administrations') ? 'active' : '' }}" href="{{ route('administrations') }}" data-turbo-action="replace">
                            <i class="fas fa-cogs"></i> {{ __('Administrations') }}
                        </a>
                    </li>
                @endif

                <!-- Facture -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('facture') ? 'active' : '' }}" href="{{ route('facture') }}" data-turbo-action="replace">
                        <i class="fas fa-file-invoice-dollar"></i> {{ __('Facture') }}
                    </a>
                </li>

                <!-- Gestion (Visible for specific roles) -->
                @if(auth()->check() && (auth()->user()->role === '1' || auth()->user()->role === '2'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gestion') ? 'active' : '' }}" href="{{ route('gestion') }}" data-turbo-action="replace">
                            <i class="fas fa-shopping-cart"></i> {{ __('Gestion des Vente') }}
                        </a>
                    </li>
                    <!-- Ciment -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ciment') ? 'active' : '' }}" href="{{ route('ciment') }}" data-turbo-action="replace">
                            <i class="fas fa-industry"></i> {{ __('Ciment') }}
                        </a>
                    </li>
                    <!-- Client -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}" data-turbo-action="replace">
                            <i class="fas fa-users"></i> {{ __('Client') }}
                        </a>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav">
                <!-- Notifications with unread count -->
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-envelope fa-2x position-relative"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notification-count">
            {{ Auth::user()->unreadNotifications->count() }}
        </span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="notification-dropdown">
        <li id="notification-items">
            <p class="text-center">Loading notifications...</p>
        </li>
        <li>
            <a href="{{ route('notifications.index') }}" class="dropdown-item text-center">View All Notifications</a>
        </li>
    </ul>
</li>

                <!-- User Settings Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu border-0">
                        <li>
                            <a class="dropdown-item text-dark" href="{{ route('profile.edit') }}" data-turbo-action="replace">
                                <i class="fas fa-user-edit"></i> {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" data-turbo-action="replace">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@7.0.0-beta.6/dist/turbo.min.js" defer></script>

</body>
</html>
