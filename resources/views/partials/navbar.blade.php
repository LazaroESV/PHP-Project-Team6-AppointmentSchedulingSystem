<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Appointment System</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.index') }}">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.create') }}">Book Appointment</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
