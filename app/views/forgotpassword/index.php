<!-- include header -->
<?php
include __DIR__ . '/../forgetpassword-header.php';
?>
<div class="container-forget fpw-body">
    <div class="form-outline m-5 ">
        <!-- Card -->
        <div class="card shadow">
            <div class="card-body p-6">
                <div class="mb-4">
                    <a href="/"><img src="/img/logo.png" class="mb-4 logo-resize-pw" alt="logo"></a>
                    <h1 class="mb-1 fw-bold">Forgot Password</h1>
                    <p>Fill the form to reset your password.</p>
                </div>
                <!-- Form -->
                <form method="POST" action="/user/generateTokenAndInsertIntoDB">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="forgotPW_email" placeholder="Enter Your Email " required="">
                    </div>
                    <!-- Button -->
                    <div class="mb-3 d-grid">
                        <button type="submit" name="forgotPW_send" class="btn btn-primary">
                            Send Reset Link
                        </button>
                    </div>
                    <span>Return to <a href="/user/auth">sign in</a></span>
                </form>
            </div><!-- Card body -->

        </div>
    </div>
</div>



<?php include __DIR__ . '/../footer.php'; ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">


</html>