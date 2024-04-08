<style>
    body {
        font-family: "Times New Roman";
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        background-color: red;
    }

    .sidebar-sticky {
        position: relative;
        top: 48px;
        height: calc(100% - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link i {
        margin-right: 8px;
    }

    .sidebar .nav-item.active {
        font-weight: 700;
    }

    .main-content {
        margin-top: 64px;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            padding-top: 112px;
        }

        .main-content {
            margin-top: 160px;
            margin-left: 250px;
        }
    }
</style>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/admin/orders">
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/manageusers" data-toggle="collapse" data-target="#users-collapse">
                    Manage users
                </a>
                <div class="collapse" id="users-collapse">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/manageusers">View users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/createUser">Add user</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/manageEvents" data-toggle="collapse" data-target="#events-collapse">
                    Manage events
                </a>
                <div class="collapse" id="events-collapse">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/manageevents">View events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/createevent">Add event</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/managelocations" data-toggle="collapse" data-target="#locations-collapse">
                    Manage locations
                </a>
                <div class="collapse" id="locations-collapse">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/managelocations">View locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/createlocation">Add location</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/manageArtists" data-toggle="collapse" data-target="#artists-collapse">
                    Manage artists
                </a>
                <div class="collapse" id="artists-collapse">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/artistsTable">View artists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/addArtist">Add artist</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/editor">
                    WYSIWYG
                </a>
            </li>
            <li>
                <a class="nav-link" href="/admin/showApiKeys">
                    Manage API keys
                </a>
            </li>
        </ul>
    </div>
</nav>
