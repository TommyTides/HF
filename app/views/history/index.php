<!-- include header -->
<?php
include __DIR__ . '/../header.php';
use App\Services\LocationService;
$locationService = new LocationService();

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
                Take a 2 hour tour the City of Haarlem to immerse yourself into the history of one of the oldest cities
                in the Netherlands. An amazing walk of discovery covering nine historic landmarks starting at St. Bavo
                Kerk the walk shows how much the city has changed from the 13th Century. Refreshments will be available
                at the iconic Jopenkerk. Do not miss on on this great opportunity for the whole family </p>
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
    <?php
    if (!empty($locations)) { 
        foreach ($locations as $loc) { 
            echo "<div style='display: flex; align-items: center; margin-bottom: 20px; width: 80%; height: 20vh; border: 1px solid #ccc; background-color: white;'>
                    <div style='flex: 1; padding: 20px;'>
                        <span class='fw-bold fs-5'>" . $loc->getName() . "</span>
                        <p>" . $loc->getDescription() . "</p>
                        <a href='history/location?id=" . $loc->getLocationId() . "' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>View More</a>
                    </div>
                    <div style='flex: 1; display: flex; justify-content: center; align-items: center;'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/pno1fwAAAABJRU5ErkJggg==' alt='Blank Image' style='width: 200px; height: 200px; object-fit: cover;' />
                    </div>
                  </div>";
        }
    }
    ?>
</div>

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

</section>
<section id="tour-schedule" class="d-flex justify-content-center flex-column">
    <div class="container mt-4 d-inline-flex flex-column justify-content-center">
        <div class="d-inline-flex mt-5 justify-content-center">
            <p class="h1 text-black mt fw-bold mb-1">LOCATIONS&nbsp;</p>
            <p class="h1 text-danger fw-bold mb-1">OVERVIEW</p>
        </div>

        <div class="d-inline-flex flex-column justify-content-center">
            <div id="featured-locations-first-line" class="mb-2 mx-auto"></div>
            <div id="featured-locations-last-line" class="mb-2 mx-auto"></div>
        </div>
        <div class="container d-flex mt-4 mb-4 flex-column">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ysxGDfG7GeKl77JNTwUEFKMa_ZV2qpk&ehbc=2E312F"
                width="1400" height=900"></iframe>
        </div>
        <div>
            <p class="text-center mt-4">
                The tour begins at the Green point A (St Bavokerk) and ends at the Red point I. The break location
                (Jopenkerk) is marked in Blue at point E.
            </p>
        </div>
    </div>
    <div class="modal" id="ticketSelector" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">A stroll through History - Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="astrollthroughhistory/getticketidfromdb">
                    <div class="modal-body d-flex justify-content-center">
                        <div class="row">
                            <div class="col m-3">
                                <h5>Language</h5>
                                <select name="languageSelectors" id="languageSelector">
                                    <option value="english">English</option>

                                    <option value="dutch">Dutch</option>
                                    <option value="german">German</option>
                                </select>
                            </div>
                            <div class="col m-3">
                                <h5>Time</h5>
                                <select name="timeSelectors" id="timeSelector">
                                    <option value="10:00">10:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-3">
                                <h5>Ticket Type</h5>
                                <select name="ticketTypeSelectors" id="ticketTypeSelector">
                                    <option value="2">Regular Ticket: €15.00</option>
                                    <option value="6">Family Ticket: €60.00</option>
                                </select>
                            </div>
                            <div class="col m-3">
                                <h5>Date</h5>
                                <select name="dateSelectors" id="dateSelector">
                                    <option value="2023-07-27">27-07-2023</option>
                                    <option value="2023-07-28">28-07-2023</option>
                                    <option value="2023-07-29">29-07-2023</option>
                                    <option value="2023-07-30">30-07-2023</option>
                                </select>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <h5>Quantity</h5>
                                <input type="number" name="input-quantity" id="input-quantity" value="1" min="1"
                                    max="10">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning rounded-0 fw-semibold"
                                    onclick="addToCartFromHistory(event)" id="btn-history-ticket"
                                    data-product-quantity="1" name="addToCart"><strong>Add To
                                        Cart</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>