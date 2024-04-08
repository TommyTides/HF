<!-- include header -->
<?php

use App\Services\LocationService;

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
  <section class="schedule">
    <div class="section__container">
      <div class="schedule__container">
        <!-- card with text -->
        <a href="/jazz" class="schedule__card">
          <h3 class="schedule__day">All Artists</h3>
        </a>
        <a href="/jazz?day=27" class="schedule__card">
          <h3 class="schedule__day">Thu</h3>
          <p class="schedule__number">27</p>
        </a>
        <a href="/jazz?day=28" class="schedule__card">
          <h3 class="schedule__day">Fri</h3>
          <p class="schedule__number">28</p>
        </a>
        <a href="/jazz?day=29" class="schedule__card">
          <h3 class="schedule__day">Sat</h3>
          <p class="schedule__number">29</p>
        </a>
        <a href="/jazz?day=30" class="schedule__card">
          <h3 class="schedule__day">Sun</h3>
          <p class="schedule__number">30</p>
        </a>
      </div>
    </div>
  </section>
</main>
<!-- End main content -->

<!-- Display all artists -->
<section class="artists">
  <div class="artist_section__container">
    <h2 class="artist__section__header">Artists</h2>
    <div class="artists__container">
      <?php foreach ($jazz_events as $jazz_event) : ?>
        <div class="artist">
          <!-- <h2><?= $jazz_event['event_id'] ?></h2> -->
          <h3 class="artist__name"><?= $jazz_event['name'] ?></h3>
          <!-- img -->
          <?php
          $image = $this->eventService->getEventImageByEventId($jazz_event['event_id']);
          if ($image && $image->getImage()) {
            // If image exists
          ?>
            <img src="<?= "img/" . $image->getImage(); ?>" alt="artist" class="artist__image" />
          <?php
          } else {
            // If no image is available
          ?>
            <img src="/img/placeholder_image.jpg" alt="No Image Available" class="artist__image" />
          <?php
          }
          ?>
          <!-- time -->
          <?php
          // Format start time and end time
          $start_time = date('H:i', strtotime($jazz_event['start_time']));
          $end_time = date('H:i', strtotime($jazz_event['end_time']));
          ?>
          <p class="artist__time"><?= "time: " . $start_time . " - " . $end_time ?></p>
          <!-- location -->
          <?php $location = $this->locationService->getLocationByEvent($jazz_event['event_id']); ?>
          <p class="artist__location"><?= "Location: " . $location->getName() ?></p>
          <!-- price -->
          <p class="artist__price">Price: €<?= $jazz_event['price_exc_vat'] ?></p>
          <a href="<?= "/jazz?event=".$jazz_event['event_id']?>" class="btn-card-hover">Read more</a>
          <button class="btn-add-to-cart">Add to Cart</button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>

<script>
  
</script>