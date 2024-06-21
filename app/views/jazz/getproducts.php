
<div id="events-date" class="col-1 mb-4">
    <div id="events-day" class="d-flex justify-content-center align-middle">
        <p class="text-white h1">
            <?php
            $dateNumber = DateTime::createFromFormat('d-m-Y', $date);
            echo $dateNumber->format('d');
            ?>
        </p>
    </div>
    <div id="events-month" class="d-flex justify-content-center">
        <p class="h2 fw-semibold text-uppercase">
            <?php
            $dateMonth = DateTime::createFromFormat('d-m-Y', $date);
            echo $dateNumber->format('M');
            ?>
        </p>
    </div>
</div>
<div id="events" class="col">
    <?php
    if ($products != null) {
        foreach ($products as $product) {
        ?>
        <div class="event border mb-4 p-1 row">
            <div class="col-sm-8 d-flex">
                <div class="flex-grow-1">
                    <a href="/jazz/event?id=<?= $product->getEventId() ?>"
                        class="h3 fw-semibold text-uppercase pt-2 pb-0 text-decoration-none text-bl">
                        <?= htmlspecialchars($product->getName()) ?></a>
                    <div class="d-flex flex-row pt-1">
                        <div class="d-flex flex-row align-items-center event-quick-info">
                            <em class="fa fa-calendar event-icon"></em>
                            <p class="m-0">
                                <?php
                                $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                                echo $datetime->format('l');
                                ?>
                            </p>
                        </div>
                        <div class="d-flex flex-row align-items-center event-quick-info">
                            <em class="fa fa-clock-o event-icon"></em>
                            <p class="m-0">
                                <?php
                                $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getStartTime());
                                $endTime = DateTime::createFromFormat('Y-m-d H:i:s', $product->getEndTime());
                                echo $startTime->format('H:i') . '-' . $endTime->format('H:i');
                                ?>
                            </p>
                        </div>
                        <div class="d-flex flex-row align-items-center event-quick-info">
                            <em class="fa fa-map-marker event-icon"></em>
                            <a href="/jazz/location?id=<?= $product->getLocationId() ?>"
                                class="m-0 text-bl text-decoration-underline">
                                <?php
                                if ($product->getSubLocation() != "") {
                                    echo $product->getLocation() . ", " . $product->getSubLocation();
                                } else {
                                    echo $product->getLocation();
                                }
                                ?></a>
                        </div>
                    </div>
                    <div class="d-flex flex-row pt-1">
                        <div class="d-flex flex-row align-items-center event-quick-info">
                            <em class="fa fa-info-circle event-icon"></em>
                            <a href="/jazz/event?id=<?= $product->getEventId() ?>"
                                class="m-0 text-bl text-decoration-underline">All Event Details</a>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-baseline pt-3">
                        <p class="h4 fw-semibold mb-0 price">&euro;
                            <?= htmlspecialchars(number_format($product->getPrice(), 2)) ?>
                        </p>
                        <p class="mb-0">inc. VAT</p>
                    </div>
                    <div class="badge bg-secondary mb-1">
                        <span class="value">
                            Seats left: <?= $product->getNoOfSeats() ?>
                        </span>
                    </div>
                    <div class="d-flex flex-row mt-1">
                        <input type="number" id="input-quantity-<?= $product->getProductId() ?>" min="1" max="10" value="1"
                            class="form-control rounded-0 ticket-input">
                        <button onclick="add_product_2(this.getAttribute('data-product-id'),
                            this.getAttribute('data-product-price'), this.getAttribute('data-product-quantity'))"
                            class="btn btn-addtocart rounded-0 fw-semibold" id="btn-product-<?= $product->getProductId() ?>"
                            data-product-id="<?= $product->getProductId() ?>" data-product-quantity="1"
                            data-product-price="<?= $product->getPrice() ?>">Add To Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 event-image" style="background-image: url('/img/jazz/<?= $product->getImage() ?>');">
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
} else {
        ?>
    <h3 class="px-3">No products found.</h3>
        <?php
    }
?>