<!--<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/../../../public/css/admintable.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php /*include(__DIR__.'/../general.php'); */?>
    <title>Manage all artists</title>
</head>
<body>
<div style="display: flex; width:100vw; height: 100%;">
    <div style="width: 15vw;">
        <?php /*include __DIR__ . '/../sidebar.php'; */?>
    </div>
    <div style="width: 85vw; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div style="width: 80%; height: 80%">
            <table style="width: 100%; " class="table table-hover table-striped">
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
                <?php /*foreach ($artists as $artist) {*/?>
                    <tr style="height: 20px; overflow:hidden;">
                        <td><?php /*echo $artist->getArtistId(); */?></td>
                        <td contenteditable='true'><?php /*echo $artist->getArtistName(); */?></td>
                        <td contenteditable='true'><?php /*echo $artist->getFirstName(); */?></td>
                        <td contenteditable='true'><?php /*echo $artist->getLastName(); */?></td>
                        <td contenteditable='true'>
                            <div style="overflow: hidden;"><?php /*echo $artist->getBiography(); */?></div>
                        </td>
                        <td contenteditable='true'><?php /*echo $artist->getMemberDescription(); */?></td>
                        <td contenteditable='true' class="event-type"><?php /*echo $artist->getEventType(); */?></td>
                        <td>
                            <a href="/admin/editartist?id=<?php /*echo $artist->getArtistId(); */?>"
                               class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                <?php /*}*/?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure that you want to permanently delete this item from the database?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="/dance/artistsTable?id=<?php /*echo $artist->getArtistId();*/?>"><button type="button"
                                                                                              class="btn btn-primary">Confirm</button></a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('td[contenteditable=true]').on('focusout', function () {
            var currentContent = $(this).text();
            var originalContent = $(this).data('original-content');
            if (currentContent !== originalContent) {
                var rowData = {
                    'artist_id': $(this).closest('tr').find('td:nth-child(1)').text(),
                    'artist_name': $(this).closest('tr').find('td:nth-child(2)').text(),
                    'first_name': $(this).closest('tr').find('td:nth-child(3)').text(),
                    'last_name': $(this).closest('tr').find('td:nth-child(4)').text(),
                    'biography': $(this).closest('tr').find('td:nth-child(5)').text(),
                    'member_description': $(this).closest('tr').find('td:nth-child(6)').text(),
                    'event_type': $(this).closest('tr').find('td:nth-child(7)').text()
                };
                if (this.className == "event-type") {
                    if (currentContent > 4 || currentContent < 1) {
                        $(this).text(originalContent);
                        return;
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '/dance/artistsTable',
                    data: rowData,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        }).on('focus', function () {
            $(this).data('original-content', $(this).text());
        });
    });
</script>
</body>

</html>
-->