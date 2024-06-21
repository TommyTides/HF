<!-- include header -->
<?php

use App\Services\LocationService;

include __DIR__ . '/../jazz_header.php';
?>

<div class="p-5 text-center bg-image header-image" style="
              background-image: url('/img/<?= $banner ?>');">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3 fw-bold header-title text-uppercase position-relative"><?= $artist->getArtistName() ?></h1>
            </div>
        </div>
        <a class="btn btn-primary rounded-0 position-relative" href="https://twitter.com/intent/tweet?text=Check%20out%20this%20artist%20<?= $artist->getArtistName() ?>!%0A%0A&url=<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            Share <i class="fa fa-twitter"></i>
        </a>
    </div>

<section id="featured-artists" class="d-flex justify-content-center flex-column">
    <div class="container mt-4 d-inline-flex flex-column justify-content-center">
        <div id="featured-artists-title" class="d-inline-flex justify-content-center">
            <p class="h2 text-white fw-bold mb-1">All performances by <?= $artist->getArtistName() ?></p>
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
<section class="container d-flex flex-row pt-4">
    <div class="flex-grow-0 p-2" style="min-width: 50%;">
        <img class="card-img-top rounded-0" src="/img/<?= $primary ?>" style="max-width: 40em;">
    </div>
    <div class="flex-grow-1 p-2">
        <p class="h1 fw-semibold text-uppercase"><?= htmlspecialchars($artist->getArtistName()) ?></p>
        <div class="row">
            <p class="col-4 fw-semibold">Social(s):</p>
            <p class="col-8"></p>
        </div>
        <div class="row">
            <p class="col-4 fw-semibold">Name(s):</p>
            <p class="col-8"><?= $artist->getMemberDescription() ?></p>
        </div>
        <div class="row">
            <p class="col-4 fw-semibold">Career Highlight(s):</p>
            <p class="col-8"></p>
        </div>
    </div>
</section>
<section class="container d-flex mt-4 mb-4 flex-column">
    <div>
        <h2 class="fw-bold">Description</h2>
    </div>
    <div class="jazz-intro-description">
        <h5 class="w-75">
            <?= $artist->getBiography() ?>
        </h5>
    </div>
</section>
<section class="container mt-4 mb-4">
    <p class="fw-bold h2">Recommended Tracks / Albums</p>
    <div id="music-samples" class="container d-flex flex-column align-items-start m-0">
        <?php
        if ($artist->getMusicSample1() != null) {
            ?>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample1() ?>?utm_source=generator"
                    width="100%" height="152" frameBorder="0" allowfullscreen=""
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
            </iframe>
            <?php
        }?>
        <?php
        if ($artist->getMusicSample2() != null) {
            ?>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample2() ?>?utm_source=generator"
                    width="100%" height="152" frameBorder="0" allowfullscreen=""
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
            </iframe>
            <?php
        }?>
        <?php
        if ($artist->getMusicSample3() != null) {
            ?>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample3() ?>?utm_source=generator"
                    width="100%" height="152" frameBorder="0" allowfullscreen=""
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
            </iframe>
            <?php
        }?>
    </div>

</section>
<section class="container mt-4 mb-4">
    <p class="fw-bold h2">Photos</p>
</section>

<!-- include footer -->
<?php
include __DIR__ . '/../jazz-footer.php';
?>