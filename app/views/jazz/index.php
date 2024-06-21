<!-- include header -->
<?php
use App\Services\LocationService;

include __DIR__ . '/../jazz_header.php';
?>

<div class="p-5 text-center bg-image header-image" style="
              background-image: url('../../img/jazz_index_header.png');">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3 fw-bold header-title position-relative">JAZZ PERFORMANCES</h1>
                <h4 class="mb-3 fw-semibold header-subtitle position-relative">FROM THURSDAY THROUGH SATURDAY</h4>
                <a class="btn btn-outline-light btn-lg rounded-0 position-relative" href="#!" role="button"
                >BOOK YOUR TICKETS</a
                >
            </div>
        </div>
    </div>

<div id="introduction">
  <?= $html ?>
</div>
<!-- End description section -->

<!-- Start main content -->
<div class="container mb-5">
    <div class="datalist-wrapper">
        <div class="search-panel">
            <div class="d-flex flex-row justify-content-around">
                <div class="d-flex flex-column col-md-4 mt-4">
                    <label for="keywords" class="mb-2"><strong>Search</strong></label>
                    <div class="form-group has-search rounded-0">
                        <span class="fa fa-search form-control-feedback rounded-0"></span>
                        <input type="text" class="form-control rounded-0" id="keywords" placeholder="Search...">
                    </div>
                </div>
                <div class="d-flex flex-column col-md-3 mt-4">
                    <label for="datepicker" class="mb-2 text-bl"><strong>Date</strong></label>
                    <div class="input-group date rounded-0" id="datepicker">
                        <input id="datepicker-input" type="text" class="form-control rounded-0" placeholder="Select a date"
                               value=<?= $date ?>>
                        <span class="input-group-append d-flex">
                        <span class="input-group-text d-block rounded-0 d-flex justify-content-center" id="datepicker-icon">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-column col-md-3 mt-4">
                    <label for="slider-tooltips" class="mb-3 text-bl"><strong>Price Range (&euro;)</strong></label>
                    <div id="slider-tooltips"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="datacontainer" class="mt-4 mb-5 container d-flex flex-row text-bl">
    <div id="events-date" class="col-1 mb-4">
        <div id="events-day" class="d-flex justify-content-center align-middle">
            <p class="text-white h1"><?php
                $dateNumber = DateTime::createFromFormat('d-m-Y H:i:s', $date);
                echo $dateNumber->format('d');
                ?></p>
        </div>
        <div id="events-month" class="d-flex justify-content-center">
            <p class="h2 fw-semibold text-uppercase"><?php
                $dateMonth = DateTime::createFromFormat('d-m-Y H:i:s', $date);
                echo $dateMonth->format('M');
                ?></p>
        </div>
    </div>
    <div id="events" class="col">
    </div>
</div>
<!-- End main content -->


<!-- include footer -->
<?php
include __DIR__ . '/../jazz-footer.php';
?>

<script>
  
</script>