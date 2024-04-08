<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <?php include(__DIR__ . '/../../header.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile Update</title>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Update Profile</h2>
    <form action="/admin/updateUser" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $user ? htmlspecialchars($user->getFirstName()) : ''; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $user ? htmlspecialchars($user->getLastName()) : ''; ?>" required>
            </div>
        </div>

        <!-- Additional user details -->
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" value="<?php echo $user ? htmlspecialchars($user->getStreet()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="house_number">House Number</label>
            <input type="text" class="form-control" id="house_number" name="house_number" value="<?php echo $user ? htmlspecialchars($user->getHouseNumber()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $user ? htmlspecialchars($user->getCity()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" value="<?php echo $user ? htmlspecialchars($user->getState()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="zip">Postal Code</label>
            <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $user ? htmlspecialchars($user->getPostalCode()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo $user ? htmlspecialchars($user->getCountry()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user ? htmlspecialchars($user->getPhoneNumber()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user ? htmlspecialchars($user->getEmail()) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option disabled selected>Select role</option>
                <?php foreach ($usertypes as $role): ?>
                    <option value="<?= htmlspecialchars($role['user_type_id']) ?>"><?= htmlspecialchars($role['user_type']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="userId" value="<?= htmlspecialchars($user->getUserId()); ?>">

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
</body>
</html>
