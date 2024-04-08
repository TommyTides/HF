<!-- include header -->
<?php

use App\Services\LocationService;

include __DIR__ . '/../header.php';
?>

<!-- Start main content -->
<main class="about">
  <div class="section__container about__container">
    <div class="about__image about__image-1" id="about">
      <img src="img\jazz\gumbo-kings-primary.png" alt="about" />
    </div>
    <div class="about__content about__content-1">
      <h3 class="section__subheader">About</h3>
      <h2 class="section__header"><?= $event->getName(); ?></h2>
      <p>
      <?= $event->getDescription() ?>
      </p>
      <div class="about__btn">
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
    </div>
  </div>

  <!-- Events Section -->
  <section class="events">
    <div class="section__container">
      <h3 class="section__subheader">Events</h3>
      <!-- for loop $artistProducts -->
      <?php foreach ($artistProducts as $artistProduct) : ?>
        <div class="event__card">
          <h3 class="event__name"><?= $artistProduct->getName(); ?></h3>
          <p class="event__time"><?= $artistProduct->getStartTime(); ?></p>
          <p class="event__location"><?= $artistProduct->getLocation(); ?></p>
          <p class="event__description"><?= $artistProduct->getDescription(); ?></p>
          <p class="event__price"><?= $artistProduct->getPrice(); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Albums Section -->
  <section class="albums">
    <div class="section__container">
      <h3 class="section__subheader">Albums</h3>
      <div class="albums__container">
        <!-- Album Card 1 -->
        <div class="album__card">
          <img src="path_to_album_image_1.jpg" alt="Album 1" />
          <!-- Add album details if needed -->
        </div>
        <!-- Album Card 2 -->
        <div class="album__card">
          <img src="path_to_album_image_2.jpg" alt="Album 2" />
          <!-- Add album details if needed -->
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End main content -->



<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>