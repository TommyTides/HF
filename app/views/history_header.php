<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <?php include(__DIR__ . '/../headgeneralinfo.php'); ?>
  <!--Delete the below line later. Only used for auto complete temporarily-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!--Delete the below line later. Only used for auto complete temporarily-->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/jazz.css" />
  <title>Haarlem Festival | HF</title>

  <script defer src="https://unpkg.com/scrollreveal"></script>
  <script defer src="/js/script.js"></script>
  <script defer src="/js/cart/cart-functionalities.js"></script>
</head>

<body>
  <header class="checkout_header" id="home">
    <nav>
      <div class="nav__bar">
        <a href="/" class="logo nav__logo">
          <!-- <a href="#">HF</a> -->
          <!-- logo png inserted -->
          <img src="/img/logo.png" alt="logo" />

        </a>
        <ul class="nav__links" id="nav-links">
          <li><a href="/jazz">Jazz</a></li>
          <li><a href="/history">History</a></li>
          <li><a href="/cart">Cart</a></li>
        </ul>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>

        <?php if (isset($_SESSION['user'])) : ?>
          <div class="nav__action__btn">
            <button class="btn">
              <span><i class="ri-user-line"></i></span> Account
            </button>
          </div>
        <?php else : ?>
          <div class="nav__action__btn">
            <a href="/user/auth" class="btn">
              <span><i class="ri-login-line"></i></span> Login
            </a>
          </div>
        <?php endif; ?>

      </div>
    </nav>
  </header>
  <!-- End Nav/Header -->