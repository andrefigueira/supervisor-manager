<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/environments') }}">
                    <span data-feather="monitor"></span>
                    Environments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/servers') }}">
                    <span data-feather="cloud"></span>
                    Servers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/programs') }}">
                    <span data-feather="layers"></span>
                    Programs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/settings') }}">
                    <span data-feather="settings"></span>
                    Settings
                </a>
            </li>
        </ul>
    </div><!-- End sidebar sticky -->
</nav>