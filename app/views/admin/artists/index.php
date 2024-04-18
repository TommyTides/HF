<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php //include(__DIR__.'/../general.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <script src="/js/admin/artistsTable.js"></script> <!-- Path to your JavaScript file -->
    <title>Manage all artists</title>
</head>
<body>

<?php include __DIR__ . '/../sidebar.php'; ?>

<div class="container main-content">
    <h1>Manage all artists</h1>
    <h3>Add new artist</h3>
    <a href="/admin/addArtist" class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> Create new artist
    </a>

    <?php if (!empty($artists)) { ?>
        <table class="table table-hover table-striped mt-3 mb-3">
            <thead>
            <tr>
                <th>Artist ID</th>
                <th>Artist Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Biography</th>
                <th>Member Description</th>
                <th>Event Type</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($artists as $artist) { ?>
                <tr>
                    <td><?php echo $artist->getArtistId(); ?></td>
                    <td><?php echo $artist->getArtistName(); ?></td>
                    <td><?php echo $artist->getFirstName(); ?></td>
                    <td><?php echo $artist->getLastName(); ?></td>
                    <td><?php echo $artist->getBiography(); ?></td>
                    <td><?php echo $artist->getMemberDescription(); ?></td>
                    <td><?php echo $artist->getEventType(); ?></td>
                    <td>
                        <a href="/admin/editartist?id=<?php echo $artist->getArtistId(); ?>"
                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/admin/deleteartist?id=<?php echo $artist->getArtistId(); ?>"
                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h3>No artists available.</h3>
    <?php } ?>
</div>

<!-- Include your scripts here -->


</body>

</html>
