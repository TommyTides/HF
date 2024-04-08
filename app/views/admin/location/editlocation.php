<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <title>Edit Location</title>
</head>

<body>
<div class="container">
    <h2>Edit Location</h2>

    <form id="update_location_form" enctype="multipart/form-data" method="post" action="/admin/updateLocation">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="updateName" value="<?= $location->getName() ?>"required>
            <input type="text" value="<?=$location->getLocationId()?> " name="locationID" hidden >

        </div>
        <div class="form-group">
            <label for="sublocation">Sublocation:</label>
            <input type="text" class="form-control" id="sublocation" name="updateSublocation"
                   value="<?= $location->getSublocation() ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" required name="updateDescription" </textarea>
            <?= $location->getDescription() ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="motto">Motto:</label>
            <input type="text" class="form-control" id="motto" name="updateMotto" value="<?= $location->getMotto() ?>">
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="updateEmail"
                       value="<?= $location->getEmail() ?>" required>
            </div>
            <div class="col form-group">
                <label for="website">Website:</label>
                <input type="url" class="form-control" id="website" name="updateWebsite"
                       value="<?= $location->getWebsite() ?>">
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="updatePhone_number"
                       value="<?= $location->getPhoneNumber() ?>" required>
            </div>
            <div class="col form-group">
                <label for="phone_number_2">Phone Number 2:</label>
                <input type="tel" class="form-control" id="phone_number_2" name="updatePhone_number_2"
                       value="<?= $location->getPhoneNumber2() ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="address_1">Address 1:</label>
            <input type="text" class="form-control" id="address_1" name="updateAddress_1" required
                   value="<?= $location->getAddress1() ?>">
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code:</label>
            <input type="text" class="form-control" id="postal_code" name="updatePostal_code" required
                   value="<?= $location->getPostalCode() ?>">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="updateCity" required
                   value="<?= $location->getCity() ?>">
        </div>
        =
        <div class="form-group">
            <label for="schedule">Schedule:</label>
            <textarea class="form-control" id="schedule" name="updateSchedule">
                    <?= $location->getSchedule() ?>
                </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="updateLocationBtn">Submit</button>
        </div>
    </form>
</div>
<?php include __DIR__ . '/../../footer.php'; ?>
</body>

</html>