<style>
    .custom-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 200px;
        height: 100%;
        background-color: #333; /* Dark background color */
        z-index: 1000; /* Ensure it's on top of other content */
        overflow-y: auto; /* Enable vertical scrolling if needed */
        padding-top: 60px; /* Add padding to avoid covering content */
    }

    .custom-sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .custom-sidebar li {
        padding: 8px 16px;
        color: #fff; /* White text color */
    }

    .custom-sidebar a {
        text-decoration: none;
        color: #fff; /* White text color */
    }

    .custom-sidebar a:hover {
        color: #007bff; /* Change color on hover */
    }

    .main-content {
        margin-left: 220px; /* Adjust margin to accommodate sidebar */
        padding-left: 20px; /* Add padding to avoid covering content */
    }
</style>

<nav class="custom-sidebar">
    <ul>
        <li>
            <a href="/admin/orders">Orders</a>
        </li>
        <li>
            <a href="/admin/manageusers">Manage Users</a>
            <ul>
                <li><a href="/admin/manageusers">View Users</a></li>
                <li><a href="/admin/createuser">Add User</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/manageevents">Manage Events</a>
            <ul>
                <li><a href="/admin/manageevents">View Events</a></li>
                <li><a href="/admin/createevent">Add Event</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/managelocations">Manage Locations</a>
            <ul>
                <li><a href="/admin/managelocations">View Locations</a></li>
                <li><a href="/admin/createlocation">Add Location</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/manageartists">Manage Artists</a>
            <ul>
                <li><a href="/admin/artistsTable">View Artists</a></li>
                <li><a href="/admin/addArtist">Add Artist</a></li>
            </ul>
        </li>
        <li><a href="/admin/editor">WYSIWYG</a></li>
        <li><a href="/admin/showApiKeys">Manage API Keys</a></li>
    </ul>
</nav>
