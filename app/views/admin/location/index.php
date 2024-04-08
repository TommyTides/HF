<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php include(__DIR__ . '/../general.php'); ?>
    <title>Manage all locations</title>
</head>

<body>
<div class="container">
    <div class="container mt-3 mb-3">
        <h1>Manage all locations</h1>
        <h3>
            Add new location
        </h3>
        <a href="/admin/createlocation" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create new
            location</a>

        <div class="container mt-3 mb-3">
            <? if (!empty($locations)) { ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($locations as $loc) { ?>
                        <tr>
                            <td>
                                <? echo $loc['location_id'] ?>
                            </td>
                            <td>
                                <? echo $loc['name'] ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST">
                                            <input type="text" name="locationID" value="<? echo $loc['location_id'] ?>"
                                                   hidden>
                                        </form>
                                        <a href="/admin/editlocation?id=<? echo $loc['location_id'] ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                    <div class="col">
                                        <a href="/admin/deletelocation?id=<? echo $loc['location_id'] ?>"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            <? } else { ?>
                <h3>No locations available.</h3>
            <? } ?>
        </div>
    </div>

</body>

</html>