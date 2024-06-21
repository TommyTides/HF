<!-- include header -->
<?php
include __DIR__ . '/../cart_header.php';
?>

<!-- Start cart content -->
<main class="page pt-5 pb-5 text-bl">
    <section class="pt-5">
        <div class="container text-bl">
            <div>
                <?php
                if (!$isShared) {
                ?>
                    <h2>Shopping cart</h2>
                <?php
                } else {
                ?>
                    <h2>Shared cart</h2>
                <?php
                }
                ?>
                <?php
                if (!empty($cartProducts) && isset($_SESSION['user']) && !$isShared) {
                ?>
                    <button class="btn btn-danger rounded-0" onclick="createLink()" id="btncreatelink">
                        <i class="fa fa-share"></i> Create link
                    </button>
                <?php
                }
                ?>
            </div>
            <div class="content-cart">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="items" id="items">
                            <?php
                            if (!empty($cartProducts)) {
                                foreach ($cartProducts as $cartProduct) {
                            ?>
                                    <div class="product pt-4 pb-4" id="product-<?= $cartProduct->getProductId() ?>">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="/<?= $cartProduct->getEventType() ?>/event?id=<?= $cartProduct->getEventId() ?>" class="img-fluid mx-auto d-block border">
                                                    <?php
                                                    if ($cartProduct->getImage() == null) {
                                                    ?>
                                                        <img class="img-fluid mx-auto d-block" src="/img/<?= htmlspecialchars($cartProduct->getEventType() . '/' . $cartProduct->getImage()) ?>">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img class="img-fluid mx-auto d-block" style="height: 6em; width: 100%; object-fit: cover;" src="/img/<?= htmlspecialchars($cartProduct->getEventType() . '/' . $cartProduct->getImage()) ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="product-name">
                                                                <a href="/<?= $cartProduct->getEventType() ?>/event?id=<?= $cartProduct->getEventId() ?>" class="text-decoration-none text-black">
                                                                    <h5 class="mb-1">
                                                                        <?= htmlspecialchars($cartProduct->getName()) ?>
                                                                    </h5>
                                                                </a>
                                                                <div class="product-info">
                                                                    <div class="badge bg-dark mb-1">
                                                                        <span class="value">
                                                                            <?= $cartProduct->getEventType() ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="badge bg-secondary mb-1">
                                                                        <span class="value">
                                                                            Seats left: <?= $cartProduct->getNoOfSeats() ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="quantity"><span>Quantity</span></label>
                                                            <input id="quantity-<?= $cartProduct->getProductId() ?>" type="number" value="<?= $cartProduct->getAmount() ?>" min="0" max="10" onchange="edit_product(this.getAttribute('data-product-id') ,this.value)" data-product-id="<?= $cartProduct->getProductId() ?>" class="form-control quantity-input" <?php echo $isShared ? 'disabled' : 'enabled'; ?>>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5 class="fw-semibold pt-4 mt-1">&euro;
                                                                <?php
                                                                echo number_format($cartProduct->getPrice(), 2);
                                                                ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                if (!$isShared) {
                                ?>
                                    <button id="clearcartbtn" onclick="clear_cart()" class="btn btn-danger rounded-0 text-white btn-md btn-block">
                                        <i class="fa fa-trash"></i> Clear cart</button>
                                <?php }
                                ?>
                                <?php
                            } else {
                                if (!$isShared) {
                                ?>
                                    <h5>Your cart is currently empty.</h5>
                                    <a href="/" class="btn btn-danger rounded-0 text-white btn-lg btn-block">
                                        Browse events</a>
                                <?php } else {
                                ?>
                                    <h5>Looks like there's nothing here.</h5>
                                    <a href="/" class="btn btn-danger rounded-0 text-white btn-lg btn-block">
                                        Browse events</a>
                                    <a href="/cart/shoppingcart" class="btn btn-danger rounded-0 text-white btn-lg btn-block">
                                        Back to my cart</a>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (!empty($cartProducts)) {
                    ?>
                        <div class="col-md-12 col-lg-3 border-start" id="summary">
                            <div class="summary sticky-xl-top sticky-lg-top sticky-md-top" style="top: 70px;">
                                <h4 class="text-muted text-bl">Summary</h4>
                                <div class="summary-item row">
                                    <span class="text col-md-4 col-sm-2 w-100">Subtotal (Excl. Tax)</span>
                                    <span class="fw-semibold col-md-5 col-sm-4" id="subtotal">
                                        &euro;
                                        <?php
                                        echo number_format($subtotal, 2);
                                        ?>
                                    </span>
                                </div>
                                <div class="summary-item row">
                                    <span class="text col-md-4 col-sm-2 w-100">Tax (Dance & Jazz)</span>
                                    <span class="fw-semibold col-md-5 col-sm-4" id="tax">
                                        9%
                                    </span>
                                </div>
                                <div class="summary-item row">
                                    <span class="text col-md-4 col-sm-2 w-100">Tax (History & Yummy)</span>
                                    <span class="fw-semibold col-md-5 col-sm-4" id="tax">
                                        21%
                                    </span>
                                </div>
                                <div class="summary-item row"><span class="text col-md-4 col-sm-2 border-top"><b>Total</b></span>
                                    <span class="fw-semibold col-md-5 col-sm-4 border-top" id="total">
                                        &euro;
                                        <?php
                                        echo number_format($total, 2);
                                        ?>
                                    </span>
                                </div>
                                <?php
                                if ($isShared) {
                                ?>
                                    <a href="/cart/shoppingcart" class="btn btn-danger rounded-0 fw-semibold text-white btn-lg btn-block mt-3">
                                        Back to my cart</a>
                                <?php
                                } else {
                                ?>
                                    <a id="checkoutbtn" href="/cart/checkout" class="btn btn-danger rounded-0 fw-semibold text-white btn-lg btn-block mt-3">
                                        Checkout</a>
                                <?php
                                } ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End cart content -->

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>