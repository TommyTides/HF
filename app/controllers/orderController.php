<?php
namespace App\Controllers;

use App\Services\OrderService;
use App\Services\PDFService;
use App\Services\ProductService;
use App\Services\EmailService;
use App\Services\QRCodeService;
use App\Services\UserService;
use App\Models\Order;

class OrderController
{
    private PDFService $pdfService;
    private ProductService $productService;
    private OrderService $orderService;
    private QRCodeService $qrCodeService;
    private UserService $userService;
    private EmailService $emailService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->pdfService = new PDFService();
        $this->orderService = new OrderService();
        $this->qrCodeService = new QRCodeService();
        $this->emailService = new EmailService();
        $this->userService = new UserService();
    }

    public function updateTicketStatus()
    {
        $productId = $_GET['productID'];
        $orderId = $_GET['orderID'];

        //get the order product
        $orderProduct = $this->orderService->getOrderProductsByOrderIdAndProductId($orderId, $productId);
        //get the ticket status
        $ticketScanned = $orderProduct[0]['is_scanned'];
        //get amount of $ticketScanned
        $ticketAmount = $orderProduct[0]['amount'];
        //get the scanned ticket number
        $scannedTicketNumber = $orderProduct[0]['amount_scanned'];

        if (is_null($orderProduct)) {
            echo '<script>alert("Order product not found")</script>';
        }
        //if amount of scanned tickets = amount of tickets in the order
        if ($ticketAmount == $scannedTicketNumber) {
            //change the ticket status to scanned 
            $this->orderService->updateTicketStatusToScanned($productId, $orderId);
            echo '<script>alert("Ticket(s) already scanned")</script>';
        }
        $this->orderService->updateScannedTicketAmountByOrderIdAndProductId($orderId, $productId);
        echo '<script>alert("Ticket successfully scanned ")</script>';
        echo '<script>window.location.href = "/admin/dashboard"</script>';

    }

    public function exportOrderToCSV()
    {
        $queryResult = $this->orderService->getAllOrders();

        $orders = array();
        foreach ($queryResult as $row) {
            $order = new Order();
            $order->setOrderId($row['order_id']);
            $order->setStatus($this->orderService->getMolliePayment($row['mollie_id'])->status);
            $order->setEmail($row['email']);
            $order->setPhoneNumber($row['phone_number']);
            $order->setBillingFirstName($row['billing_first_name']);
            $order->setBillingLastName($row['billing_last_name']);
            $order->setBillingStreet($row['billing_street']);
            $order->setBillingPostalCode($row['billing_postal_code']);
            $order->setBillingCity($row['billing_city']);
            $order->setTimestamp($row['timestamp']);
            $order->setAmount($this->orderService->getMolliePayment($row['mollie_id'])->amount->value);

            $orders[] = $order;
        }

        $columns = $_GET['columns'];

        $filename = 'myOrder.csv';
        $fp = fopen('php://output', 'w');

        $columns = explode(",", $columns);
        $header = [];

        foreach ($columns as $column) {
            $header[] = explode(".", $column)[1];
        }

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        fputcsv($fp, $header);

        foreach ($orders as $order) {

            $fields = array();
            foreach ($columns as $column) {
                $fields[] = $order->{explode(".", $column)[0]}();
            }
            fputcsv($fp, $fields);
        }
        fclose($fp);
        exit;
    }

    public function downloadInvoice()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
        } else if (isset($_GET['mollie_id'])) {
            $orderId = $this->orderService->getOrderIdByMollieId($_GET['mollie_id'])['order_id'];
        } else {
            echo '<script>alert("Invalid order")</script>';
            echo '<script>window.location.href = "/user/orders"</script>';
            return;
        }

        $order = $this->orderService->getOrderById($orderId);
        $orderProducts = $this->orderService->getOrderProductsById($orderId);
        $customerName = $order->getBillingFirstName() . ' ' . $order->getBillingLastName();

        // Generate pdf file
        $invoicePdf = $this->orderService->generateInvoice($orderProducts, $orderId, $customerName);

        // Set content-type header for pdf file
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="invoice.pdf"');

        // Output pdf content
        echo $invoicePdf;
    }
}