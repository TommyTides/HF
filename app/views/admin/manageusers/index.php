<!DOCTYPE html>
<html>

<head>
    <?php include(__DIR__ . '/../general.php'); ?>

    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Manage Users</title>
</head>
<?php include __DIR__ . '/../sidebar.php'; ?>
<body>
<div class="container">

    <div class="container mt-3 mb-3">
        <h1>Manage Users</h1>
        <h3>
            Add new user
        </h3>

        <a href="/admin/createUser" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create new
            user</a>

        <div class="container mt-3 mb-3">
            <? if (!empty($users)) { ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($users as $user) { ?>
                        <tr>
                            <td>
                                <? echo $user->getUserId() ?>
                            </td>
                            <td>
                                <? echo $user->getFirstName() . " " . $user->getLastName(); ?>
                            </td>
                            <td>
                                <? echo $user->getCreatedAt() ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST">
                                            <input type="text" name="userId" value="<? echo $user->getUserId() ?>"
                                                   hidden>
                                        </form>
                                        <a href="/admin/editUser?id=<? echo $user->getUserId() ?>"
                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                    <div class="col">
                                        <a href="/admin/deleteUser?id=<? echo $user->getUserId() ?>"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            <? } else { ?>
                <h3>No users available.</h3>
            <? } ?>
        </div>
    </div>

</body>

</html>
