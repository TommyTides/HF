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
      <h3 class="section__subheader">A Stroll Through History</h3>
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
        <a href="#" class="schedule__card">
          <h3 class="schedule__day">All locations</h3>
        </a>
        <a href="#" class="schedule__card">
          <h3 class="schedule__day">Thu</h3>
          <p class="schedule__number">27</p>
        </a>
        <a href="#" class="schedule__card">
          <h3 class="schedule__day">Fri</h3>
          <p class="schedule__number">28</p>
        </a>
        <a href="#" class="schedule__card">
          <h3 class="schedule__day">Sat</h3>
          <p class="schedule__number">29</p>
        </a>
        <a href="#" class="schedule__card">
          <h3 class="schedule__day">Sun</h3>
          <p class="schedule__number">30</p>
        </a>
      </div>
    </div>
  </section>
</main>
<!-- End main content -->

<!-- Display all artists -->


<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>

<script>
  // Access the artist data from controller
  var artists = <?php echo $artists_json; ?>;

  console.log(artists);
</script>