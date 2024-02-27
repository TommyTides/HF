<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Web Design Mastery | HF</title>

  <script defer src="https://unpkg.com/scrollreveal"></script>
  <script defer src="js/script.js"></script>
</head>

<body>
  <header class="header" id="home">
    <nav>
      <div class="nav__bar">
        <div class="logo nav__logo">
          <!-- <a href="#">MNTN</a> -->
          <!-- logo png inserted -->
          <img src="img/logo.png" alt="logo" />

        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#about">Your program</a></li>
          <li><a href="#equipment">Jazz</a></li>
          <li><a href="#blog">History</a></li>
          <li><a href="#equipment">Yummy!</a></li>
        </ul>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
        <div class="nav__action__btn">
          <button class="btn">
            <span><i class="ri-user-line"></i></span> Account
          </button>
        </div>
      </div>
    </nav>
    <div class="section__container header__container">
      <div class="header__content">
        <h3 class="section__subheader">Explore Haarlem's Beauty!</h3>
        <h1 class="section__header">
          The Festival
        </h1>
        <div class="countdown section__header countdown-container">
          <p id="demo"></p>
        </div>
        <div class="scroll__btn">
          <a href="#about">
            Scroll down
            <span><i class="ri-arrow-down-line"></i></span>
          </a>
        </div>
      </div>
      <div class="header__socials">
        <span>Follow us</span>
        <a href="#"><i class="ri-instagram-line"></i></a>
        <a href="#"><i class="ri-twitter-fill"></i></a>
      </div>
    </div>
  </header>

  <section class="about">
    <div class="section__container about__container">
      <div class="about__image about__image-1" id="about">
        <img src="img/about-1.jpg" alt="about" />
      </div>
      <div class="about__content about__content-1">
        <h3 class="section__subheader">Welcome to The Festival</h3>
        <h2 class="section__header">27th to 31st July 2024</h2>
        <p>
        Starting on Thursday 27th July, the Festival will take place and it is all about discoveries around the city of Haarlem, where the fun is guranteed for both adults and little ones From walking tours of the city as well as culinary events, a special quest at the Teyler museum for the sherlocks to be and a jazz event in the evening: there is something to do for every family member, this years edition is guaranteed to bring you and your family an unforgettable festival experience.
        </p>
        <div class="about__btn">
          <a href="#">
            Read more
            <span><i class="ri-arrow-right-line"></i></span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <main class="page-content">
    <div class="card">
      <div class="content">
        <h2 class="title">Jazz</h2>
        <p class="copy">We are thrilled to bring you a weekend full of toe-tapping tunes and soulful melodies. Get ready to swing and sway as we take over the city with the smooth sound of jazz.</p>
        <button class="btn-card-hover">View Artists</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">History</h2>
        <p class="copy">Immerse yourself in history with our historic walk, travel back in time, this tour aims to give all-round historic information about the city's landmark.</p>
        <button class="btn-card-hover">View Trips</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Food</h2>
        <p class="copy">Welcome to Yummy, Haarlem's premier food festival! We are excited to showcase the delicious cuisine and vibrant culinary scene of our city.</p>
        <button class="btn-card-hover">Book Now</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Your program</h2>
        <p class="copy">Create your own personal program and share it with your friends!</p>
        <button class="btn-card-hover">Book Now</button>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="logo footer__logo">
          <a href="#">HAARLEM FESTIVAL</a>
        </div>
        <p>
          Explore the beauty of Haarlem with our festival. Join us for a weekend of music, food, and outdoor activities.
        </p>
      </div>
      <div class="footer__col">
        <h4>Food</h4>
        <ul class="footer__links">
          <li><a href="#">Dutch food</a></li>
          <li><a href="#">International food</a></li>
          <li><a href="#">Jopen beer</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>The Festival</h4>
        <ul class="footer__links">
          <li><a href="#">Your program</a></li>
          <li><a href="#">Jazz</a></li>
          <li><a href="#">History</a></li>
          <li><a href="#">Yummy!</a></li>
        </ul>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2024 INH Group 3. All rights reserved.
    </div>
  </footer>
</body>

</html>