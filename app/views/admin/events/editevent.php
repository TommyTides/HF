<!DOCTYPE html>
<html>

<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Edit event</title>
</head>
<body>
<? //php include __DIR__ . '/../sidebar.php'; ?>
<div class="container">
    <h2>Edit Event</h2>

    <form enctype="multipart/form-data" class="validate" method="post" action="/admin/updateEvent ">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" value="<?= $event->getName() ?>" required
                   name="updateName">
            <input type="text" hidden value="<?= $event->getEventId() ?>" name="eventId">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" value=""
                      name="updateDescription"><?= $event->getDescription() ?></textarea>
        </div>

        <div class="form-group">
            <label for="sublocation">Sub Description:</label>
            <input type="" class="form-control" id="subDescription" required
                   value="<?= $event->getSubDescription() ?>" name="updateSubDescription">
        </div>
        <div class="input-group-date">
            <label for="startDateTime">Start Date and Time:</label>
            <input type="datetime-local" class="form-control" id="startDateTime" value="<?= $event->getStartTime() ?>"
                   required name="updateStartDateTime">
        </div>

        <div class="form-group">
            <label for="endDateTime">End Date and Time:</label>
            <input type="datetime-local" class="form-control" value="<?= $event->getEndTime() ?>" id="motto" required
                   name="updateEndDateTime">
        </div>


        <div class="form-group">
            <label for="schedule">Select Location:</label>
            <select class="form-control" id="event" name="eventLocation" required>

                <?php foreach ($locations as $location): ?>
                    <option value="<?= $location['location_id'] ?>"><?= $location['location_id'] ?>. <?= $location['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="schedule">Select Event Type:</label>
            <select class="form-control" id="event" name="eventTypeId" required>
                <?php foreach ($eventTypes as $eventType): ?>
                    <option value="<?= $eventType['event_type_id'] ?>"><?= $eventType['event_type_id'] ?>. <?= $eventType['event_type'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="updateEventBtn">Submit</button>
        </div>
        <!--<div class="form-group">
            <label for="name">No of Seats:</label>
            <input type="number" value="<?php /*= $event->getNoOfSeats() */?>" class="form-control" required id="noOfSeats" name="noOfSeats">
        </div>-->
    </form>
</div>
</body>

</html>