<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/jazz.css" />
  <title>Web Design Mastery | HF</title>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/components/datepicker.js"></script>
  <script src="/js/components/nouislider.min.js"></script>
  <script src="/js/components/createslider.js" defer></script>
  <script type="text/javascript" src="/js/jazz/filter_products.js" defer></script>
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
          <li><a href="/dance">Dance</a></li>
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