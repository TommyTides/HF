<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <title>Register New User</title>
</head>

<body>

<div class="container mt-5">
    <h2>Register New User</h2>
    <form action="/admin/addNewUser" method="POST">

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="password"
                       placeholder="Create a password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-eye" onclick="togglePassword()" id="togglePassword" style="cursor: pointer"></i>
                    </span>
                </div>
            </div>
            <small class="form-text text-muted">Password must be 8+ characters with at least one letter and one number.</small>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
            </div>
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

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="state">State/Province</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
        </div>

        <div class="form-group">
            <label for="house_number">House Number</label>
            <input type="text" class="form-control" id="house_number" name="house_number" required>
        </div>
        <div class="form-group">
            <label for="street">Street </label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>

        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>

<script>
    function togglePassword() {
        let passwordInput = document.getElementById('inputPassword');
        let toggleIcon = document.getElementById('togglePassword');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>

</body>
</html>
