<!DOCTYPE html>
<html>

<head>
    <?php include(__DIR__ . '/../general.php'); ?>

    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Manage all Events</title>
</head>
<?php include __DIR__ . '/../sidebar.php'; ?>
<body>

<div class="container">

    <div class="container mt-3 mb-3">
        <h1>Manage all events</h1>
        <h3>
            Add new event
        </h3>
        <a href="/admin/createevent" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create new
            event</a>

        <div class="container mt-3 mb-3">
            <? if (!empty($events)) { ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($events as $event) { ?>
                        <tr>
                            <td>
                                <? echo $event['event_id'] ?>
                            </td>
                            <td>
                                <? echo $event['name'] ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST">
                                            <input type="text" name="eventID" value="<? echo $event['event_id'] ?>"
                                                   hidden>
                                        </form>
                                        <a href="/admin/editEvent?id=<? echo $event['event_id'] ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                    <div class="col">
                                        <a href="/admin/deleteEvent?id=<? echo $event['event_id'] ?>"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            <? } else { ?>
                <h3>No events available.</h3>
            <? } ?>
        </div>
    </div>

</body>

</html>