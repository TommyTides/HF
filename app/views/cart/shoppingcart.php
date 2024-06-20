<!-- include header -->
<?php
include __DIR__ . '/../cart_header.php';
?>

<!-- Start cart content -->
<div class="cart-content">
    <div class="cart-items">
        <?php foreach ($cartItems as $item) : ?>
            <div class="cart-item">
                <div class="item-image">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                </div>
                <div class="item-name"><?php echo $item['name']; ?></div>
                <div class="item-quantity">
                    <input id="quantity-<?= $item->getProductId() ?>" type="number" value="<?php echo $item['quantity']; ?>" min="1">
                </div>
                <div class="item-price">
                    <span class="original-price">$<?php echo $item['price']; ?></span>
                    <span class="total-price">$<?php echo $item['price'] * $item['quantity']; ?></span>
                </div>
                <div class="remove-button">
                    <button>Remove</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cart-total">
        <div class="subtotal">
            <span class="label">Subtotal:</span>
            <span class="value">$<?php echo $subtotal; ?></span>
        </div>
        <!-- <div class="tax">
            <span class="label">Tax:</span>
            <span class="value">$<?php echo $tax; ?></span>
        </div> -->
        <div class="total">
            <span class="label">Total:</span>
            <span class="value">$<?php echo $total; ?></span>
        </div>
    </div>
</div>
<!-- End cart content -->

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>