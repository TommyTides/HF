<!-- include header -->
<?php
include __DIR__ . '/../header.php';
use App\Services\LocationService;
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

<div class="container mt-3 mb-3">
            <? if (!empty($locations)) { ?>
                <ol class="text-justify ps-md-4">
                    <? foreach ($locations as $loc) { ?>

                        <a class="custom-card" href="/astrollthroughhistory/location?id=<? echo $loc['location_id'] ?>">
                            <div class="card bg-light border-0 p-4 m-4" style="max-width: 70vw;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="fw-bold align-middle text-left p-4 mb-3">
                                            <li class="mb-3">
                                                <? echo $loc['name'] ?>
                                            </li>
                                        </h2>

                                        <p class="p-3 text-truncate">
                                            <? echo $loc['description'] ?>
                                        </p>
                                        <div class="col-md-12 ">
                                            <h5 class="p-2 m-4 mt-5">Learn more <a
                                                    href="https://en.wikipedia.org/wiki/Church_of_St._Bavo,_Haarlem"
                                                    target="_blank"><i class="fa fa-chevron-right"></i></a></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <img src="../../images/<? if (!empty($loc['image'])) {
                                            echo $loc['image'];
                                        } else
                                            echo "no-image.jpg"; ?>" class="img-fluid"
                                            style="width: 100%; height: 80%;">
                                    </div>
                                </div>
                            </div>


                        <? } ?>
                    <? } else { ?>
                        <p>No locations available.</p>
                    <? } ?>

                </a>
            </ol>
        </div>
    </section>
    <section id="tour-schedule" class="d-flex justify-content-center flex-column">
        <div class="container mt-4 d-inline-flex flex-column justify-content-center">
            <div class="d-inline-flex mt-5 justify-content-center">
                <p class="h1 text-black mt fw-bold mb-1">TOUR&nbsp;</p>
                <p class="h1 text-danger fw-bold mb-1">SCHEDULE</p>
            </div>
            <div class="d-inline-flex flex-column justify-content-center">
                <div id="featured-locations-first-line" class="mb-2 mx-auto"></div>
                <div id="featured-locations-last-line" class="mb-2 mx-auto"></div>
            </div>
            <div>
                <table class="table table-bordered mt-5 table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <?php foreach (array_keys(reset($schedule)) as $date): ?>
                                <th>
                                    <?php echo date('l, F j, Y', strtotime($date)) ?>
                                </th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($schedule as $time => $dates): ?>
                            <tr>
                                <th>
                                    <?php echo $time ?>
                                </th>
                                <?php foreach ($dates as $date => $languages): ?>
                                    <td class="p-3">
                                        <?php
                                        $languages_array = is_array($languages) ? $languages : explode(',', $languages); // split the language string by comma and create an array of languages
                                        foreach ($languages_array as $language):
                                            $language = trim($language); // remove any leading/trailing spaces
                                            $flag_path = '../../images/historyimages/' . strtolower($language) . '.png';
                                            ?>
                                            <img class="m-2" src="<?php echo $flag_path; ?>" alt="<?php echo $language; ?> flag"
                                                width="90vw">
                                        <?php endforeach; ?>
                                    </td>

                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container mt-3 mb-3">

        </div>

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>
