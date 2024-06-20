<!-- include header -->
<?php
include __DIR__ . '/../checkout_header.php';
?>

<main class="page pt-5 pb-5 bg-light">
    <div class="container">
        <div class="pt-5">
            <h2>Checkout</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3 sticky-xl-top sticky-lg-top sticky-md-top" style="top: 70px;">
                    <span class="text-muted">Your items</span>
                </h4>
                <?php
                if (!empty($cartProducts)) {
                ?>
                <ul class="list-group mb-3 sticky-xl-top sticky-lg-top sticky-md-top" style="top: 115px;">
                    <?php
                    foreach ($cartProducts as $cartProduct) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?= htmlspecialchars($cartProduct->getName()); ?></h6>
                                <small class="text-muted">Quantity:
                                    <?= $cartProduct->getAmount() ?>x
                                </small>
                                <small class="text-muted">&euro; <?= number_format($cartProduct->getPrice(),2) ?></small>
                            </div>
                            <span class="text-muted">&euro;
                                <?= number_format($cartProduct->getPrice() * $cartProduct->getAmount(), 2);
                                ?></span>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span class="text-muted">&euro; <?= number_format($subtotal, 2) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tax (Dance & Jazz)</span>
                        <span class="text-muted">9%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tax (History & Yummy)</span>
                        <span class="text-muted">21%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Euro)</span>
                        <strong>&euro; <?= number_format($total, 2) ?> </strong>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form id="checkout-form" method="post" action="/cart/payment">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder=""
                                   value="<?php
                                   if ($user != null && !empty ($user->getFirstName())) {
                                       echo htmlspecialchars($user->getFirstName());
                                   } ?>"
                                   name="billingFirstName" pattern="^[a-zA-Z][\sa-zA-Z]*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder=""
                                   value="<?php
                                   if ($user != null && !empty ($user->getLastName())) {
                                       echo htmlspecialchars($user->getLastName());
                                   } ?>"
                                   name="billingLastName" pattern="^[a-zA-Z][\sa-zA-Z]*" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com"
                               name="billingEmail" value="<?php
                        if ($user != null && !empty($user->getEmail())) {
                            echo htmlspecialchars($user->getEmail());
                        } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" placeholder="+31 6 12345678"
                               name="billingPhoneNumber" value="<?php
                        if ($user != null && !empty($user->getPhoneNumber())) {
                            echo htmlspecialchars($user->getPhoneNumber());
                        }
                        ?>"
                               required>
                    </div>
                    <div class="mb-0">
                        <label for="street">Address</label>
                        <input type="text" class="form-control" id="street"
                               placeholder="Street address, P.O. box, company name" name="billingStreet"
                               value="<?php
                               if ($user != null && !empty($user->getAddress())) {
                                   echo htmlspecialchars($user->getAddress());
                               }
                               ?>" required>
                    </div>
                    <div class="mb-0">
                        <label for="housenumber">House Number</label>
                        <input type="text" class="form-control" id="housenumber"
                               placeholder="House Number" name="billingHouseNumber"
                               value="<?php
                               if ($user != null && !empty($user->getHouseNumber())) {
                                   echo htmlspecialchars($user->getHouseNumber());
                               }
                               ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="citytown">City / Town</label>
                        <input type="text" class="form-control" id="citytown" name="billingCity"
                               pattern="^[a-zA-Z][\sa-zA-Z]*"
                               value="<?php
                               if ($user != null && !empty($user->getCity())) {
                                   echo htmlspecialchars($user->getCity());
                               }
                               ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="billingCountry" required>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="stateprovince">State / Province</label>
                            <input type="text" class="form-control" id="stateprovince" placeholder=""
                                   name="billingState"
                                   value="<?php
                                   if ($user != null && !empty($user->getState())) {
                                       echo htmlspecialchars($user->getState());
                                   }
                                   ?>" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" name="billingZip"
                                   value="<?php
                                   if ($user != null && !empty($user->getPostalCode())) {
                                       echo htmlspecialchars($user->getPostalCode());
                                   }
                                   ?>" required>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input id="checkbox-shipping" type="checkbox" class="custom-control-input" id="same-address"
                               checked onchange="toggleShipping(this);">
                        <label class="custom-control-label" for="same-address">
                            Shipping address is the same as my billing address</label>
                    </div>
                    <hr class="mb-4">
                    <div id="shipping-diff" class="collapse">
                        <h4 class="mb-3">Shipping address</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstNameShip">First name</label>
                                <input type="text" class="form-control" id="firstNameShip" placeholder="" value=""
                                       disabled="disabled" name="shippingFirstName"
                                       pattern="^[a-zA-Z][\sa-zA-Z]*" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastNameShip">Last name</label>
                                <input type="text" class="form-control" id="lastNameShip" placeholder="" value=""
                                       disabled="disabled" name="shippingLastName"
                                       pattern="^[a-zA-Z][\sa-zA-Z]*" required>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label for="streetShip">Street</label>
                            <input type="text" class="form-control" id="streetShip" value=""
                                   placeholder="Street address, P.O. box, company name" disabled="disabled"
                                   name="shippingStreet" required>
                        </div>
                        <div class="mb-0">
                            <label for="housenumberShip">House Number</label>
                            <input type="text" class="form-control" id="housenumberShip" value="" disabled="disabled"
                                   placeholder="House Number" name="shippingHouseNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="citytownShip">City / Town</label>
                            <input type="text" class="form-control" id="citytownShip" disabled="disabled"
                                   name="shippingCity" pattern="^[a-zA-Z][\sa-zA-Z]*" required>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="countryShip">Country</label>
                                <select class="custom-select d-block w-100" id="countryShip" disabled="disabled"
                                        name="shippingCountry" required>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="stateprovinceShip">State / Province</label>
                                <input type="text" class="form-control" id="stateprovinceShip" placeholder=""
                                       disabled="disabled" name="shippingState" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zipShip">Zip</label>
                                <input type="text" class="form-control" id="zipShip" placeholder=""
                                       disabled="disabled" name="shippingZip" required>
                            </div>
                        </div>
                        <hr class="mb-4">
                    </div>
                    <button class="btn btn-danger btn-lg btn-block text-primary" type="submit" name="submit">
                        Checkout</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
<?= include __DIR__ . '/../footer.php'; ?>
