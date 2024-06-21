<?php
include __DIR__ . '/../jazz_header.php';
use App\Services\LocationService;
$locationService = new LocationService();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if ($location->getSubLocation() !== null) {
            echo $location->getName() . ", " . $location->getSublocation();
        } else {
            echo $location->getName();
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/historyevent/location.css">
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3oj3wUTL4FW2UkT1ZyIhz_QQCkCfBKHo"></script>
    <script src="/js/location/location.js" defer></script>
    
</head>

<body onload="initMap('<?php echo $location->getAddress1() . ', ' . $location->getPostalCode() ?>')">
    <header>
        <div class="p-5 text-center bg-image header-image" style="
              background-image: url('../../img/<?php if (!empty($images[0])) {
                  echo $images[0]->getImage();
              } else {
                  echo 'no-image.png';
              } ?>');">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white position-relative">
                    <h1 class="mb-3 fw-bold header-title text-uppercase">
                        <?php echo $location->getName() ?>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="content-wrapper">
            <section class="container p-4">
                <div class="row justify-content-md-center">
                    <div class="col-7">
                        <h2 class="text-uppercase fw-semibold pb-2">
                            <?php
                            if ($location->getSubLocation() !== null) {
                                echo $location->getName() . ", " . $location->getSublocation();
                            } else {
                                echo $location->getName();
                            }
                            ?>
                        </h2>
                        <h3 class="text-uppercase pb-2">
                            <?= $location->getMotto() ?>
                        </h3>
                        <p style="width: 80%;">
                            <?= $location->getDescription() ?>
                        </p>
                    </div>
                    <div class="col-5 img-thumbnail" style="background-size: cover; background-image: url('/img/<?php
                    if (!empty($images[1])) {
                        echo $images[1]->getImage();
                    } else {
                        echo 'no-image.png';
                    } ?>');">
                    </div>
                </div>
            </section>
            <section class="container p-4 pt-2">
                <div class="row">
                    <div class="col-4">
                        <div class="pb-3">
                            <em class="fa fa-calendar"></em> <strong>Opening Schedule</strong>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <p class="fw-semibold mb-1" style="width: 20rem;">
                                    <?= $location->getSchedule() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pb-3">
                            <em class="fa fa-map-marker"></em> <strong>Location</strong>
                        </div>
                        <div class="d-flex flex-column">
                            <p class="fw-semibold mb-1">
                                <?= $location->GetAddress1() ?>
                            </p>
                            <p class="fw-semibold mb-1">
                                <?= $location->getPostalCode() ?>,
                                <?= $location->getCity() ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pb-3">
                            <em class="fa fa-phone"></em> <strong>Contact</strong>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <p class="fw-semibold mb-1" style="width: 4.5rem;">Email:</p>
                                <p class="fw-semibold mb-1">
                                    <?= $location->getEmail() ?>
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-semibold mb-1" style="width: 4.5rem;">Website:</p>
                                <p class="fw-semibold mb-1">
                                    <?= $location->getWebsite() ?>
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-semibold mb-1" style="width: 4.5rem;">Phone:</p>
                                <p class="fw-semibold mb-1">
                                    <?= $location->getPhoneNumber() ?>
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-semibold mb-1" style="width: 4.5rem;">Phone 2:</p>
                                <p class="fw-semibold mb-1">
                                    <?= $location->getPhoneNumber2() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <section class="container bg-light p-4">
                        <h4>Location Pictures</h4>
                        <div class="d-flex flex-row justify-content-evenly">
                            <img class="img-thumbnail" style="max-width: 30%;" src="../../img/<?php
                            if (!empty($images[2])) {
                                echo $images[2]->getImage();
                            } else {
                                echo 'no-image.png';
                            } ?>">
                            <img class="img-thumbnail" style="max-width: 30%;" src="../../img/<?php
                            if (!empty($images[3])) {
                                echo $images[3]->getImage();
                            } else {
                                echo 'no-image.png';
                            } ?>">
                            <img class="img-thumbnail" style="max-width: 30%;" src="../../img/<?php
                            if (!empty($images[4])) {
                                echo $images[4]->getImage();
                            } else {
                                echo 'no-image.png';
                            } ?>">
                        </div>
                    </section>
            </section>
        </div>
    </main>
    <footer>
        <?php include(__DIR__ . '/../footer.php'); ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
</body>

</html>
