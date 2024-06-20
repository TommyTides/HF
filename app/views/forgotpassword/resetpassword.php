<!-- include header -->
<?php
include __DIR__ . '/../forgetpassword-header.php';
?>
<div class="container-resetpw">
    <div class="form-outline m-5 ">
        <!-- Card -->
        <div class="card shadow">
            <div class="card-body p-6">
                <form action="/user/updatePasswordInDB" method="POST">
                    <div class="mb-4">
                        <h1 class="mb-1 fw-bold">Forgot Password</h1>
                        <p>Fill the form to reset your password.</p>
                    </div>
                    <!-- Email -->
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">

                    <label for="inputPassword">Password</label>
                    <div style="display: flex;">
                        <input type="password" class="form-control" id="inputPassword" name="resetPW_password" placeholder="Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                        <span class="" style="margin-left: 5px;">
                            <i class="fa fa-eye btn btn-primary" onclick="togglePassword()" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <small class="form-text text-muted">Your password must be at least 8 characters long and contain
                        at least one
                        letter and one number.</small>

                    <div class="row">
                        <div id="success-icon" class="col float-left">
                            <i class="fa fa-check-circle text-success"></i>
                        </div>
                        <label for="inputConfirmPassword">Confirm Password</label>
                    </div>
                    <input type="password" class="form-control" id="inputConfirmPassword" name="resetPW_confirm" placeholder="Confirm Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                    <br>
                    <!-- <div id="success-message" class="alert alert-danger" role="alert">
                            Passwords do not match!
                        </div> -->

                    <!-- Button -->
                    <div class="mb-3 d-grid">
                        <button type="submit" name="resetPW_btn" class="btn btn-primary">
                            Send Reset Link
                        </button>
                    </div>
                    <span>Return to <a href="/user/auth">sign in</a></span>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php
include __DIR__ . '/../footer.php';
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script type="text/javascript" defer src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" defer src="/js/register/register.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">


</html>