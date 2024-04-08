<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/../../public/css/adminsidebar.css">
    <?php include(__DIR__ . '/../general.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Create event</title>
</head>
<body>


<div class="container">
    <h2>Create Event</h2>

    <form enctype="multipart/form-data" method="post" action="/admin/addEvent ">
        <div class="form-group">
            <label for="location_image_primary">Banner image:</label>
            <input type="file" class="form-control-file" required id="eventImageBanner" name="eventImageBanner[]">
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" required id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="sublocation">Sub Description:</label>
            <input type="" class="form-control" id="subDescription" required name="subDescription">
        </div>
        <div class="input-group-date">
            <label for="startDateTime">Start Date and Time:</label>
            <input type="datetime-local" class="form-control" id="startDateTime" required name="startDateTime">
        </div>

        <div class="form-group">
            <label for="endDateTime">End Date and Time:</label>
            <input type="datetime-local" class="form-control" id="motto" required name="endDateTime">
        </div>

        <div class="form-group">
            <label for="schedule">Select Location:</label>
            <select class="form-control" id="event" name="eventLocation" required>
                <option value="0">No Location selected</option>
                <?php foreach ($locations as $location): ?>
                    <option value="<?= $location['location_id'] ?>"><?= $location['location_id'] ?>. <?= $location['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="schedule">Select Event Type:</label>
            <select class="form-control" id="event" name="eventType" required>
                <option value="0">No event type selected</option>
                <?php foreach ($eventTypes as $eventType):?>
                    <option value="<?= $eventType['event_type_id'] ?>"><?= $eventType['event_type_id']   ?>. <?= $eventType['event_type']  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="createEvent">Submit</button>
        </div>
    </form>
</div>
</body>

</html>