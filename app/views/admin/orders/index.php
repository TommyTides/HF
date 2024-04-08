<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php include(__DIR__ . '/../general.php'); ?>
    <script type="text/javascript" src="/js/admin/exportData.js"></script>
    <title>Manage all locations</title>
</head>
<?php include __DIR__ . '/../sidebar.php'; ?>
<body>
<div class="container">
    <div style="width: 85vw; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div style="width: 80%; height: 80%">
            <div class="container mt-3 mb-3">
                <h1>Manage Orders</h1>
                <div class="container mt-3 mb-3">
                    <? if (!empty($orders)) { ?>
                        <button style="margin-bottom: 20px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#columnSelectModal">Export To .CSV</button>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Billing First Name</th>
                                <th>Billing Last Name</th>
                                <th>Billing Street</th>
                                <th>Billing Postal Code</th>
                                <th>Billing City</th>
                                <th>Total Payed Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($orders as $order) { ?>
                                <tr>
                                    <td>
                                        <? echo $order->getOrderId() ?>
                                    </td>
                                    <td class="">
                                        <div class="badge bg-secondary p-2">
                                            <?= $order->getStatus() ?>
                                        </div>
                                        <?php
                                        if ($order->getStatus() == 'open' || $order->getStatus() == 'pending')
                                        { ?>
                                            <form id="paymentForm" action="/cart/payopenorder" method="POST" class="pt-2">
                                                <input type="hidden" name="payment_id" id="paymentIdInput" value="<?= $order->getMollieId() ?>">
                                                <input type="hidden" name="payment_url" id="paymentUrlInput" value="<?= $order->getCheckoutUrl() ?>">
                                                <button type="submit" class="badge bg-danger p-2 text-decoration-none">Pay now</button>
                                            </form>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <? echo $order->getEmail() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getPhoneNumber() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getBillingFirstName() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getBillingLastName() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getBillingStreet() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getBillingPostalCode() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getBillingCity() ?>
                                    </td>
                                    <td>
                                        <? echo $order->getAmount() ?>
                                    </td>
                                    <td>
                                        <a href="/admin/editOrder?id=<?echo $order->getOrderId()?>" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                    <? } else { ?>
                        <h3>No orders available.</h3>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</body>
<div class="modal fade" id="columnSelectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Options</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Please select the columns that you'd like to export.
                <div class="container mt-5" style="margin-top:10px !important; padding-top:0 !important;">
                    <form method="POST">

                        <div class="form-group">
                            <label><input type="checkbox" name="getOrderId" id="orderID"> OrderID</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getStatus" id="Status"> Status</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getEmail" id="Email"> Email</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getPhoneNumber" id="Phone Number"> Phone Number</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getBillingFirstName" id="Billing First Name"> Billing First Name</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getBillingLastName" id="Billing Last Name"> Billing Last Name</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getBillingStreet" id="Billing Street"> Billing Street</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getBillingPostalCode" id="Billing Postal Code"> Billing Postal Code</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getBillingCity" id="Billing City"> Billing City</label>
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="getAmount" id="Total Amount"> Total Payed Amount</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportData()" data-bs-toggle="modal" data-bs-target="#columnSelectModal" class="btn btn-primary">Export</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>