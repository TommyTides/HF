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
      <h2 class="section__header">Gumbo Kings</h2>
      <p>
        The Gumbo Kings are a five-piece band that combines the groove of New Orleans with rough delta blues and the melody of soul from ancient Memphis.
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
      <!-- Add your events content here -->
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