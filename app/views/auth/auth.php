<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF Authentication</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="/css/auth.css" />
</head>

<body>

    <a href="/" class="logo" target="_blank">
        <img src="/img/logo.png" alt="">
    </a>

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <form class="card-front" action="/user/validateUser" method="POST">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Log In</h4>
                                            <div class="form-group">
                                                <input type="email" name="email_Login" class="form-style" placeholder="Your Email" id="emailLogin" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password_Login" class="form-style" placeholder="Your Password" id="inputPassword" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button id="sign-in-button" name="login_Button" class="btn mt-4">submit</button>
                                            <p class="mb-0 mt-4 text-center"><a href="/user/forgotPassword" class="link">Forgot your password?</a></p>
                                        </div>
                                    </div>
                                </form>
                                <form class="card-back" method="POST" action="/user/signUp">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign Up</h4>
                                            <!-- firstName -->
                                            <div class="form-group">
                                                <input type="text" name="firstname_Register" class="form-style" placeholder="Your First Name" id="inputFirstName" autocomplete="off">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <!-- lastname -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="lastname_Register" class="form-style" placeholder="Your Last Name" id="inputLastName" autocomplete="off">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <!-- email -->
                                            <div class="form-group mt-2">
                                                <input type="email" name="email_Register" class="form-style" placeholder="Your Email" id="inputEmail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <!-- password -->
                                            <div class="form-group mt-2">
                                                <input type="password" name="password_Register" class="form-style" placeholder="Your Password" id="inputPassword2" autocomplete="off" >
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <!-- city -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="city_Register" class="form-style" placeholder="Your City" id="inputCity" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <!-- street -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="street_Register" class="form-style" placeholder="Your Street" id="inputStreetNumber" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <!-- house number -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="houseNumber_Register" class="form-style" placeholder="Your House Number" id="inputHouseNumber" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <!-- post code -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="postcode_Register" class="form-style" placeholder="Your Postcode" id="inputPostCode" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <!-- country -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="country_Register" class="form-style" placeholder="Your Country" id="inputCountry" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <!-- state -->
                                            <div class="form-group mt-2">
                                                <input type="text" name="state_Register" class="form-style" placeholder="Your State" id="inputState" autocomplete="off">
                                                <i class="input-icon uil uil-home"></i>
                                            </div>
                                            <button id="signUpBtn" name="signUpBtn" class="btn mt-4">submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" defer src="../../js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript" defer src="../../js/login.js"></script> -->
    <script type="text/javascript" defer src="../../js/auth.js"></script>
</body>

</html>