<!-- include header -->
<?php
include __DIR__ . '/../jazz_header.php';
?>
<div class="history-bg w-100">
    <div class="p-5 text-center bg-image header-image" style="
                background-image: url('../../img/historyimages/historyeventbanner.png');">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3 fw-bold header-title text-uppercase">
                    <? echo ($event['name']); ?>
                </h1>
                <h4 class="mb-3 fw-semibold header-subtitle">
                    <? echo ($event['sub_description']); ?>
                </h4>
                <div class="d-flex justify-content-center my-3">
                    <a class="btn btn-outline-light btn-lg rounded-0 bg-white text-dark" data-toggle="modal"
                        data-target="#ticketSelector">BOOK YOUR TICKETS</a>
                </div>

            </div>
        </div>
    </div>

    <section class="container d-flex mt-4 mb-4 flex-column history-bg text-white">
        <div class="row">
            <div class="col">
                <h2 class="fw-bold align-middle text-sm-left p-4 mb-3 text-white">Experience History</h2>
            </div>
            <div class="col-8 d-flex text-sm-right">
                <p class="text-justify ps-sm-4 text-white">
                    <?php echo ($event['description']); ?>
                </p>
            </div>
        </div>
    </section>
    <section class="row text-white">
        <h4 class="mb-3 fw-semibold text-center flex-sm-column header-subtitle text-white">
            <?php echo $startDate . " - " . $endDate; ?>
        </h4>

        <div class="col d-flex mt-4 mb-4 flex-column">
            <h3 class="fw-bold text-danger mb-3 text-center m-10 mb-md-0 text-white">General information</h3>
        </div>
        <div class="col-7">
            <?php if (!empty($generalInfo)) { ?>
                <ul class="text-justify ps-md-4 text-white">
                    <?php foreach ($generalInfo as $info) { ?>
                        <li class="mb-3 text-white">
                            <?php echo ($info['information']); ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="text-white">No general information available.</p>
            <?php } ?>
        </div>
    </section>

    <section id="featured-locations" class="d-flex justify-content-center flex-column">
        <div class="container mt-4 d-inline-flex flex-column justify-content-center">
            <div class="d-inline-flex mt-5 justify-content-center">
                <p class="h1 text-white mt fw-bold mb-1">FEATURED LOCATIONS</p>


            </div>
            <div class="d-inline-flex flex-column justify-content-center">
                <div id="featured-locations-first-line" class="mb-2 mx-auto"></div>
                <div id="featured-locations-last-line" class="mb-2 mx-auto"></div>
            </div>
        </div>

        <div class="container mt-3 mb-3">
            <? if (!empty($locations)) { ?>
                <ol class="text-justify ps-md-4">
                    <? foreach ($locations as $loc) { ?>

                        <a class="custom-card" href="/history/location?id=<? echo $loc['location_id'] ?>">
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
                                        <img src="../../img/<? if (!empty($loc['image'])) {
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
                <p class="h1 text-white mt fw-bold mb-1">TOUR SCHEDULE</p>

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
                                            $flag_path = '../../img/historyimages/' . strtolower($language) . '.png';
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
                <p class="h1 text-white mt fw-bold mb-1">LOCATIONS OVERVIEW</p>
            </div>

            <div class="d-inline-flex flex-column justify-content-center">
                <div id="featured-locations-first-line" class="mb-2 mx-auto"></div>
                <div id="featured-locations-last-line" class="mb-2 mx-auto"></div>
            </div>
            <div class="container d-flex mt-4 mb-4 flex-column">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1qwZ9hJVON-v68Y74zsySv21h0k1Lcrw&ehbc=2E312F"
                    width="1300" height="680"></iframe>
            </div>
            <div>
                <p class="text-center mt-4 text-white">
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
                    <form method="POST" action="/history/getticketidfromdb">
                        <div class="modal-body d-flex justify-content-center">
                            <div class="row">
                                <div class="col m-3">
                                    <h5>Language</h5>
                                    <select name="languageSelectors" id="languageSelector">
                                        <option value="english">English</option>

                                        <option value="dutch">Dutch</option>
                                        <option value="german">Chinese</option>
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
                                        <option value="2">Regular Ticket: €17.50</option>
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
</div>


<?php
include __DIR__ . '/../history-footer.php';
?>