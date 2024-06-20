<?php
include __DIR__ . '/../jazz_header.php';
?>

<body>
    <div id="landing-image">
        <img src="/img/landing-image-<?= str_replace(' ', '', $artist_name) ?>.jpg" class="img-fluid w-100">
    </div>
    <section class="position-relative">
        <div class="position-absolute top-0 start-0 mt-3 ms-3">
            <h1 class="text-white fw-bolder fs-1 lh-1 mb-0"><?= strtoupper($artist_name) ?></h1>
            <h1 class="text-white fw-light fs-3 lh-1">AT DANCE</h1>
            <div class="mt-4"></div>
        </div>
        <div class="position-absolute bottom-0 start-0 mb-3 ms-3">
            <a href="/dance/getProducts?artistId=<?= $artist->getArtistId() ?>" class="btn btn-danger btn-lg fw-bold fs-5 me-2">GET YOUR TICKETS NOW!</a>
            <a href="#appearances" class="btn btn-light btn-lg fw-bold fs-5">SEE SCHEDULE</a>
        </div>
    </section>

    <section class="container mt-5">
        <div class="row">
            <div class="col">
                <strong>
                    <p class="fs-4 fw-light">WHO IS <?= strtoupper($artist_name) ?>?</p>
                </strong>
                <p class="fs-5 fw-normal"><?= strtoupper($artist->getBiography()) ?></p>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <p class="fs-4 fw-bold">RECOMMENDED TRACKS</p>
        <div id="music-samples">
            <?php
            if ($artist->getMusicSample1() != null) {
            ?>
                <iframe style="border-radius:12px; margin-bottom: 30px;" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample1() ?>?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                </iframe>
            <?php
            } ?>
            <?php
            if ($artist->getMusicSample2() != null) {
            ?>
                <iframe style="border-radius:12px; margin-bottom: 30px;" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample2() ?>?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                </iframe>
            <?php
            } ?>
            <?php
            if ($artist->getMusicSample3() != null) {
            ?>
                <iframe style="border-radius:12px; margin-bottom: 30px;" src="https://open.spotify.com/embed/track/<?= $artist->getMusicSample3() ?>?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                </iframe>
            <?php
            } ?>
        </div>
    </section>

    <section id="appearances" class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="fs-4 fw-light"><?= strtoupper($artist_name) ?><strong>&nbsp;APPEARANCES</strong></p>
                <p class="fs-4 fw-light">AT DANCE!</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($appearances as $appearance) {
                if ($appearance->getName() == $artist_name) {
                    $name = $appearance->getDescription();
                    $filepath = strtolower(str_replace(' ', '', $name));
            ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="card-title fs-5 fw-bold text-center"><?= strtoupper(date('l', strtotime($appearance->getStartTime()))) ?>&nbsp;&nbsp;<?= substr($appearance->getStartTime(), 5, -8) ?></p>
                                <hr>
                                <a href="/dance/event?id=<?= $appearance->getEventId() ?>" class="d-block">
                                    <img src="/img/artist-appearance-<?= $filepath ?>.png" class="card-img-top" alt="">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="text-white text-center mb-0">CLICK TO BUY THE TICKET!</p>
                                    </div>
                                </a>
                                <p class="card-text fs-5 fw-bold text-center mt-2"><?= substr($appearance->getStartTime(), 11, -3) ?> - <?= substr($appearance->getEndTime(), 11, -3) ?></p>
                                <hr>
                                <p class="card-text fs-5 fw-normal text-center"><?= strtoupper($appearance->getDescription()) ?></p>
                                <p class="card-text fs-6 fw-light text-center"><?= $appearance->getSubDescription() ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <?php
    include __DIR__ . '/../footer.php';
    ?>