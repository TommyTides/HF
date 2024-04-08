<!DOCTYPE html>
<html>

<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Edit event</title>
</head>
<?php include __DIR__ . '/../sidebar.php'; ?>
<body>
<div class="container">
    <div style="margin: 3vw;">
        <h2>Edit Order</h2>

        <form method="POST">

            <input type="hidden" name="order_id" value="<?php echo $order->getOrderId() ?>">
            <input type="hidden" name="mollie_id" value="<?php echo $order->getMollieId() ?>">

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $order->getEmail() ?>">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $order->getPhoneNumber() ?>">
            </div>
            <div class="form-group">
                <label>Billing First Name</label>
                <input type="text" class="form-control" name="billing_first_name" value="<?php echo $order->getBillingFirstName() ?>">
            </div>
            <div class="form-group">
                <label>Billing Last Name</label>
                <input type="text" class="form-control" name="billing_last_name" value="<?php echo $order->getBillingLastName() ?>">
            </div>
            <div class="form-group">
                <label>Billing Street</label>
                <input type="text" class="form-control" name="billing_street" value="<?php echo $order->getBillingStreet() ?>">
            </div>
            <div class="form-group">
                <label>Billing Postal Code</label>
                <input type="text" class="form-control" name="billing_postal_code" value="<?php echo $order->getBillingPostalCode() ?>">
            </div>
            <div class="form-group">
                <label>Billing City</label>
                <input type="text" class="form-control" name="billing_city" value="<?php echo $order->getBillingCity() ?>">
            </div>
            <div class="form-group">
                <label>Order Status</label>
                <label>Order Status</label>
                <select class="form-select" name="order_status" aria-label="status">
                    <option value="1" <?php echo ($order->getStatus() == 'paid') ? 'selected' : ''; ?>>paid</option>
                    <option value="2" <?php echo ($order->getStatus() == 'pending') ? 'selected' : ''; ?>>pending</option>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
</html>