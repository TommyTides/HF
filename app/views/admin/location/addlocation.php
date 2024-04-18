<!DOCTYPE html>
<html>

<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Create new Location</title>
</head>
<?php include(__DIR__ . '/../sidebar.php'); ?>
<body>
<div class="container">
    <h2>Create Location</h2>

    <form id="create_location_form" enctype="multipart/form-data" method="post" action="/admin/createNewLocation">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" required id="name" name="name">
        </div>
        <div class="form-group">
            <label for="sublocation">Sublocation:</label>
            <input type="text" class="form-control" id="sublocation" name="sublocation">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" required name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="motto">Motto:</label>
            <input type="text" class="form-control" id="motto" required name="motto">
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" required name="email">
            </div>
            <div class="col form-group">
                <label for="website">Website:</label>
                <input type="url" class="form-control" id="website" required name="website">
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="col form-group">
                <label for="phone_number_2">Phone Number 2:</label>
                <input type="tel" class="form-control" id="phone_number_2"  name="phone_number_2">
            </div>
        </div>

        <div class="form-group">
            <label for="address_1">Address 1:</label>
            <input type="text" class="form-control" id="address_1" name="address_1" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code:</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="location_image_primary">Banner image:</label>
            <input type="file" class="form-control-file" id="locationImage" name="locationImage[]" required>
        </div>
        <div class="form-group">
            <label for="location_image_primary">Detail images (Select max 5)</label>
            <input type="file" class="form-control-file" id="detailImages" name="detailImages[]" multiple required>
        </div>
        <div class="form-group">
            <label for="schedule">Select event:</label>
            <select class="form-control" id="event" name="event" required>
                <option value="0">No event selected</option>
                <?php foreach ($events as $event): ?>
                    <option value="<?= $event['event_id'] ?>"><?= $event['event_id'] ?>. <?= $event['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="schedule">Schedule:</label>
            <textarea class="form-control" id="schedule"  name="schedule"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="createLocationBtn">Submit</button>
        </div>
    </form>
</div>
</body>

</html>