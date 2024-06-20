<h1>Invoice order <?echo $orderId?></h1>
<table>
    <tr>
        <td><strong>Customer Name:</strong></td>
        <td><?php echo $customerName; ?></td>
    </tr> 
    <tr>
        <td><strong>Order Number:</strong></td>
        <td><?php echo $orderId ?></td>
    </tr>
</table>
<br><br>
<br><br>
<table style="padding: 10px;">
    <thead>
        <tr>
            <th>Item name</th>
            <th>Quantity</th>
            <th>Price (excl. Taxes)</th>
            <th>Tax rate</th>
            <th>Tax amount</th>
            <th>Price (incl. Taxes)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalExclTax = 0;
        $totalInclTax = 0;
        $quantity = array();

        foreach ($orderProducts as $product) {
   
            $name = $product->getName();
            $price = $product->getPrice();
            $taxRate = $product->getVat()* 100;

            // Calculate the quantity of each product in the order
            $product_id = $product->getProductId();
            if (isset($quantity[$product_id])) {
                $quantity[$product_id]++;
            } else {
                $quantity[$product_id] = 1;
            }

            $priceExclTax = $price * $quantity[$product_id];
            $taxAmount = $priceExclTax * ($product->getVat() / 100);
            $priceInclTax = $priceExclTax + $taxAmount;

            $totalExclTax += $priceExclTax;
            $totalInclTax += $priceInclTax;
        ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $quantity[$product_id]; ?></td>
            <td>&euro;<?php echo number_format($price, 2); ?></td>
            <td><?php echo $taxRate/100 . '%'; ?></td>
            <td>&euro;<?php echo number_format($taxAmount, 2); ?></td>
            <td>&euro;<?php echo number_format($priceInclTax, 2); ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"><strong>Total (excl. Taxes):</strong></td>
            <td>&euro;<?php echo number_format($totalExclTax, 2); ?></td>
        </tr>
        <tr>
            <td colspan="5"><strong>Total (incl. Taxes):</strong></td>
            <td>&euro;<?php echo number_format($totalInclTax, 2); ?></td>
        </tr>
    </tfoot>
</table>
