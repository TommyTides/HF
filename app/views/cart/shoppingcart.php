<!-- include header -->
<?php
include __DIR__ . '/../header.php';
?>

<!-- Start cart content -->
<div class="container-custom">
    <div class="row">
        <aside class="col-lg-9">
            <div class="card-custom">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart-custom">
                        <thead class="text-muted-custom">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <tr>
                                    <td>
                                        <figure class="itemside-custom align-items-center">
                                            <div class="aside"><img src="https://i.imgur.com/1eq5kmC.png" class="img-custom-sm"></div>
                                            <figcaption class="info-custom"> <a href="#" class="title text-dark no-decoration" data-abc="true">Tshirt with round nect</a>
                                                <p class="text-muted-custom small">SIZE: L <br> Brand: MAXTRA</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select> </td>
                                    <td>
                                        <div class="price-wrap-custom"> <var class="price-custom">$10.00</var> <small class="text-muted-custom"> $9.20 each </small> </div>
                                    </td>
                                    <td class="text-right"> <a href="" class="btn btn-light-remove"> Remove</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card-custom mb-3">
                <div class="card-custom-body">
                    <form>
                        <div class="form-group"> <label>Have coupon?</label>
                            <div class="input-group"> <input type="text" class="form-control coupon-custom" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply-custom coupon-custom">Apply</button> </span> </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-custom-body">
                    <dl class="dlist-align-custom">
                        <dt>Total price:</dt>
                        <dd class="text-right ml-3">$69.97</dd>
                    </dl>
                    <dl class="dlist-align-custom">
                        <dt>Discount:</dt>
                        <dd class="text-right text-danger ml-3">- $10.00</dd>
                    </dl>
                    <dl class="dlist-align-custom">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                    </dl>
                    <hr> <a href="#" class="btn btn-out-custom btn-primary btn-square btn-main-custom btn-purchase btn-purchase" data-abc="true"> Make Purchase </a> <a href="#" class="btn btn-out-custom btn-success btn-square btn-main-custom mt-2 btn-continue-shopping" data-abc="true">Continue Shopping</a>
                </div>
            </div>
        </aside>
    </div>
</div>

<!-- End cart content -->



<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>