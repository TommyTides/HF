<!-- include header -->
<?php
include __DIR__ . '/../header.php';
?>

<!-- Start description section -->
<section class="about">
  <div class="section__container about__container">
    <div class="about__image about__image-1" id="about">
      <img src="img/about-1.jpg" alt="about" />
    </div>
    <div class="about__content about__content-1">
      <h3 class="section__subheader">Haarlem Jazz</h3>
      <h2 class="section__header">27th to 30th July 2024</h2>
      <p>
      The Haarlem Jazz Festival is a four-day celebration of jazz music, taking place from July 27th to July 30th in the historic city of Haarlem. Set against the stunning backdrop of Haarlem's historic architecture and picturesque canals, the festival brings together some of the biggest names in jazz, as well as up-and-coming talent, for a series of concerts, workshops, and jam sessions. With a diverse lineup of international and local artists, the Haarlem Jazz Festival is a must-attend event for any jazz enthusiast. 
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
<!-- End description section -->

<!-- Start main content -->
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
<!-- End main content -->

<!-- Display all artists -->
<section class="artists">
  <div class="section__container">
    <h2 class="section__header">Artists</h2>
    <div class="artists__container">
      <?php foreach ($artists as $artist) : ?>
        <div class="artist">
          <img src="img/artist-1.jpg" alt="artist" />
          <h3 class="artist__name"><?= $artist->artist_name ?></h3>
          <p class="artist__description"><?= $artist->first_name ?> <?= $artist->last_name ?></p>
          <p class="artist__description"><?= $artist->biography ?></p>
          <button class="btn-card-hover">Read more</button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>