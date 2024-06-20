<!-- include header -->
<?php
include __DIR__ . '/../cart_header.php';
?>

<main class="page pt-5 pb-5 bg-light">
    <section class="pt-5 d-flex flex-column">
        <div class="container d-flex justify-content-center">
            <?php
            if ($payment->isPaid()) {
                echo "<h1>Payment succesfully received!</h1>";
            } else if ($payment->isOpen()) {
                echo "<h1>Payment has been opened.</h1>";
            } else if ($payment->isPending()) {
                echo "<h1>Payment is pending...</h1>";
            } else if ($payment->isFailed()) {
                echo "<h1>Oops! The payment failed, please try again.</h1>";
            } else if ($payment->isExpired()) {
                echo "<h1>Oops! The payment expired, please try again.</h1>";
            } else if ($payment->isCanceled()) {
                echo "<h1>Payment has been canceled.</h1>";
            }
            ?>
        </div>
        <div class="d-flex justify-content-center h4">
            <?= "Order ID: " . $payment->id ?>
        </div>
        <div class="d-flex justify-content-center h4">
            <?= $payment->paidAt ?>
        </div>
        <div class="d-flex justify-content-center h3">
            <?= $payment->method ?>
        </div>
        <div class="d-flex justify-content-center h3 fw-semibold">
            <?= $payment->amount->currency . " " . $payment->amount->value ?>
        </div>
        <?php
            if ($payment->isOpen() || $payment->isPending())
            {
                echo "<div class='d-flex justify-content-center pt-3'>
                        <a class='btn btn-danger' href='" . $payment->getCheckoutUrl() . "'>Pay pending amount</a>
                    </div>";
            }
        ?>
        <?php
            if ($payment->isPaid()) {
                ?>
                <div class="d-flex justify-content-center pt-3">
                    <a href="/order/downloadinvoice?mollie_id=<?= $payment->id ?>" class="btn btn-danger">Download invoice</a>
                </div>
                <?php
            }
        ?>

        <div class="d-flex justify-content-center pt-3">
            <a class="btn btn-danger" href="/user/orders">View your orders</a>
        </div>
    </section>
</main>
<?php include(__DIR__ . '/../footer.php'); ?>
</body>
</html>