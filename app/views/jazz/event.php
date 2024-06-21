<!-- include header -->
<?php

use App\Services\LocationService;

include __DIR__ . '/../jazz_header.php';
?>

<section id="featured-artists" class="d-flex justify-content-center flex-column">
    <div class="container mt-4 d-inline-flex flex-column justify-content-center">
        <div id="featured-artists-title" class="d-inline-flex justify-content-center">
            <p class="h2 text-white fw-bold mb-1">Get your tickets</p>
        </div>
    </div>
    <div class="container d-flex flex-row mt-3 justify-content-center">
        <div id="events-product-date" class="col-1 mb-4">
            <div id="events-product-day" class="d-flex justify-content-center align-middle">
                <p class="h1"><?php
                    $dateNumber = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                    echo $dateNumber->format('d');
                    ?></p>
            </div>
            <div id="events-product-month" class="d-flex justify-content-center">
                <p class="h2 fw-semibold text-uppercase text-white"><?php
                    $dateMonth = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                    echo $dateMonth->format('M');
                    ?></p>
            </div>
        </div>
        <div id="event" class="border-top border-4 border-white">
            <div class="d-flex flex-row pt-1">
                <div class="d-flex flex-row align-items-center event-quick-info">
                    <em class="fa fa-calendar event-icon text-white"></em>
                    <p class="m-0 text-white"><?php
                        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                        echo $datetime->format('l');
                        ?></p>
                </div>
                <div class="d-flex flex-row align-items-center event-quick-info">
                    <em class="fa fa-clock-o event-icon text-white"></em>
                    <p class="m-0 text-white"><?php
                        $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                        $endTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getEndTime());
                        echo $startTime->format('H:i') . '-' . $endTime->format('H:i');
                        ?></p>
                </div>
                <div class="d-flex flex-row align-items-center event-quick-info">
                    <em class="fa fa-map-marker event-icon text-white"></em>
                    <a href="/jazz/location?id=<?= $product->getLocationId() ?>" class="m-0 text-white text-decoration-underline">
                        <?php
                        if ($product->getSublocation() != "") {
                            echo $product->getLocation() . ", " . $product->getSubLocation();
                        } else {
                            echo $product->getLocation();
                        }
                        ?></a>
                </div>
            </div>
            <div class="d-flex flex-row align-items-baseline pt-3 text-white">
                <p class="h4 fw-semibold mb-0 price">&euro;<?= htmlspecialchars(number_format($product->getPrice(),2)) ?></p>
                <p class="mb-0">inc. VAT</p>
            </div>
            <div class="d-flex flex-row mt-1">
                <input type="number" name="tickets-id" min="1" max="10" value="1"
                       class="form-control rounded-0 ticket-input">
                <btn onclick="" class="btn-addtocart fw-semibold" id="btn-product-<?= $product->getProductId() ?>">Add To Cart</btn>
            </div>
        </div>
    </div>
</section>
<section class="container d-flex mt-4 mb-4 flex-column">
    <div>
        <h2 class="fw-bold pb-2">Performing Artists</h2>
    </div>
    <div class="d-flex">
        <?php
        for ($i = 0; $i < count($artists); $i++) {
            ?>
            <div class="card p-2 rounded-0 bg-light border-0" style="max-width: 250px;">
                <div class="d-flex justify-content-center">
                    <img class="card-img-top rounded-0 pt-2 event-artist-image" src="/img/jazz/<?= $artistImages[0] ?>">
                </div>

                <p class="h4 p-2 fw-bold card-text text-center"><?= $artists[$i]->getArtistName() ?></p>
                <a class="btn btn-primary rounded-0" href="/jazz/artist?id=<?= $artists[$i]->getArtistId() ?>">Artist Info</a>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<section id="event-location">
    <div class="container d-flex flex-row p-3">
        <div class="flex-grow-1">
            <p class="h1 fw-semibold text-uppercase"><?= $location->getName() . " " . $location->getSubLocation() ?></p>
            <p class="h3 text-uppercase"><?= $location->getMotto() ?></p>
            <a class="btn btn-danger rounded-0 mt-2" href="/jazz/location?id=<?= $location->getLocationId() ?>">Location details</a>
            <p class="mt-1">For any questions or concerns, please contact the location.</p>
        </div>
        <div class="flex-grow-1">
            <img class="card-img-top rounded-0" src="/img/<?= $locationImage ?>" style="max-height: 22em;">
        </div>
    </div>
</section>
<section id="featured-artists" class="d-flex justify-content-center flex-column">
    <div class="container mt-4 d-inline-flex flex-column justify-content-center">
        <div id="featured-artists-title" class="d-inline-flex justify-content-center">
            <p class="h2 text-white fw-bold mb-1">All performances by <?= $artists[0]->getArtistName() ?></p>
        </div>
    </div>
    <div class="container d-flex flex-row mt-3 justify-content-center">
        <?php
        $count = count($artistProducts);
        $i = 0;
        foreach ($artistProducts as $product) {
            ?>
            <div id="event" class="pb-4">
                <div class="d-flex flex-row pt-1">
                    <div class="d-flex flex-row align-items-center event-quick-info">
                        <em class="fa fa-calendar event-icon text-white"></em>
                        <p class="m-0 text-white"><?php
                            $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                            echo $datetime->format('M d, Y');
                            ?>
                        </p>
                    </div>
                    <div class="d-flex flex-row align-items-center event-quick-info p-0">
                        <em class="fa fa-clock-o event-icon text-white"></em>
                        <p class="m-0 text-white"><?php
                            $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                            $endTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getEndTime());
                            echo $startTime->format('H:i') . '-' . $endTime->format('H:i');
                            ?>
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center event-quick-info">
                    <em class="fa fa-map-marker event-icon text-white"></em>
                    <a href="/jazz/location?id=<?= $product->getLocationId() ?>" class="m-0 text-white text-decoration-underline">
                        <?php
                        if ($product->getSublocation() != "") {
                            echo $product->getLocation() . ", " . $product->getSubLocation();
                        } else {
                            echo $product->getLocation();
                        }
                        ?>
                    </a>
                </div>
                <div class="d-flex flex-row align-items-baseline pt-2 text-white mb-2">
                    <p class="h4 fw-semibold mb-0 price">&euro;<?= htmlspecialchars(number_format($product->getPrice(),2)) ?></p>
                    <p class="mb-0">inc. VAT</p>
                </div>
                <a class="btn btn-danger rounded-0" href="/jazz/event?id=<?= $product->getEventId() ?>">See event</a>
            </div>
            <?php
            $i++;
            if ($i != $count) {
                ?>
                <div class="border border-white m-4 mt-0 mb-4"></div>
                <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
</section>

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>