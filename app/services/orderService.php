<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Services\ProductService;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;
use Exception;
use App\Models\Order;
use App\Services\PDFService;
use App\Services\QRCodeService;
use App\Services\EmailService;

class OrderService
{

    private PDFService $pdfService;
    private QRCodeService $qrCodeService;
    private OrderRepository $orderRepository;
    private EmailService $emailService;
    private ProductService $productService;

    private string $apiKey = "test_fHj92GyRd6GkUcgzArsaCPk9BngUH7";

    public function __construct()
    {
        $this->qrCodeService = new QRCodeService();
        $this->emailService = new EmailService();
        $this->pdfService = new PDFService();
        $this->orderRepository = new OrderRepository();
        $this->productService = new ProductService();
    }


    public function getOrderProductsById($orderId)
    {
        $orderProducts = $this->orderRepository->getOrderProductsById($orderId);
        return $orderProducts;
    }
    public function getOrderById($orderId): Order
    {
        return $this->orderRepository->getOrderById($orderId);

    }
    public function updateTicketStatusToScanned($productId, $orderId)
    {
        return $this->orderRepository->updateTicketStatusToScanned($productId, $orderId);
    }
    public function getOrderProductsByOrderIdAndProductId($orderId, $productId)
    {
        return $this->orderRepository->getOrderProductsByOrderIdAndProductId($orderId, $productId);
    }
    public function checkIfTicketScanned($productId, $orderId)
    {
        $result= $this->orderRepository->checkIfTicketScanned($productId, $orderId);
        if ($result['is_scanned'] == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getScannedTicketAmountByOrderIdAndProductId($order_id,$product_id){
        return $this->orderRepository->getScannedTicketAmountByOrderIdAndProductId($order_id,$product_id);
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }
    public function updateScannedTicketAmountByOrderIdAndProductId($order_id,$product_id){
        return $this->orderRepository->updateScannedTicketAmountByOrderIdAndProductId($order_id,$product_id);
    }
    public function updateOrder($order)
    {
        return $this->orderRepository->updateOrder($order);
    }

    /**
     * Creates a payment in Mollie and saves the payment in the database
     * @return \Mollie\Api\Resources\Payment|object|void
     */
    public function createPayment()
    {
        // Clear payment_id session
        unset($_SESSION['temp_payment_id']);

        // Create payment
        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey($this->apiKey);
            $cartProducts = $this->productService->getCartProducts();
            $total = $this->productService->getTotalPrice($cartProducts);
            $description = $this->createDescription($cartProducts);

            // Create and return payment
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => number_format($total, 2,
                    ) // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                "description" => "$description",
                // "redirectUrl" => "https://thefestival.ngrok.app/cart/process",
                "redirectUrl" => "https://crab-better-presumably.ngrok-free.app/cart/process",
                "locale" => "en_US",
                "dueDate" => date('Y-m-d', strtotime('+1 day')), // Set the due date
            ]);
            $_SESSION['temp_payment_id'] = $payment->id;
            return $payment;
        } catch (ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        } catch (Exception $e) {
            echo "General error: " . htmlspecialchars($e->getMessage());
        }
    }

    /**
     * Creates a description for the payment
     * @param $cartProducts
     * @return string
     */
    function createDescription($cartProducts): string
    {
        $description = '';
        foreach ($cartProducts as $product) {
            $description .= $product->getProductId() . ' x ' . $product->getAmount() . ', ';
        }
        return $description;
    }

    /**
     * Saves the payment in the database
     * @param $paymentId
     * @return void
     */
    function savePayment($molliePayment): void
    {
        // Set payment information
        $paymentInfo = $this->setPaymentInfo();

        // Save order
        $orderId = $this->orderRepository->saveOrder($molliePayment->id, $molliePayment->status, $molliePayment->amount->value, $paymentInfo);

        // Save order products
        $cartProducts = $this->productService->getCartProducts();
        $this->orderRepository->saveOrderProducts($orderId, $cartProducts);
    }

    /**
     * Sets the payment information
     * @return array
     */
    function setPaymentInfo(): array
    {
        $paymentInfo = array();
        $paymentInfo['email'] = $_SESSION['confirmationData']['billingEmail'];
        $paymentInfo['phoneNumber'] = $_SESSION['confirmationData']['billingPhoneNumber'];
        if (isset($_SESSION['confirmationData']['shippingFirstName'])) {
            $paymentInfo['firstName'] = $_SESSION['confirmationData']['shippingFirstName'];
            $paymentInfo['lastName'] = $_SESSION['confirmationData']['shippingLastName'];
            $paymentInfo['street'] = $_SESSION['confirmationData']['shippingStreet'];
            $paymentInfo['houseNumber'] = $_SESSION['confirmationData']['shippingHouseNumber'];
            $paymentInfo['city'] = $_SESSION['confirmationData']['shippingCity'];
            $paymentInfo['country'] = $_SESSION['confirmationData']['shippingCountry'];
            $paymentInfo['state'] = $_SESSION['confirmationData']['shippingState'];
            $paymentInfo['zip'] = $_SESSION['confirmationData']['shippingZip'];
        } else {
            $paymentInfo['firstName'] = $_SESSION['confirmationData']['billingFirstName'];
            $paymentInfo['lastName'] = $_SESSION['confirmationData']['billingLastName'];
            $paymentInfo['street'] = $_SESSION['confirmationData']['billingStreet'];
            $paymentInfo['houseNumber'] = $_SESSION['confirmationData']['billingHouseNumber'];
            $paymentInfo['city'] = $_SESSION['confirmationData']['billingCity'];
            $paymentInfo['country'] = $_SESSION['confirmationData']['billingCountry'];
            $paymentInfo['state'] = $_SESSION['confirmationData']['billingState'];
            $paymentInfo['zip'] = $_SESSION['confirmationData']['billingZip'];
        }

        return $paymentInfo;
    }

    /**
     * Processes the payment
     * @param $payment
     * @return void
     */
    public function processPayment($payment): void
    {
        if ($payment != null) {

            // Check if order with mollie payment id already exists
            $order = $this->orderRepository->getOrderByMollieID($payment->id);

            // If order doesn't exist, save payment
            if ($order == null) {
                // Check status before saving payment
                if ($payment->isPaid() || $payment->isOpen() || $payment->isPending()) {
                    $this->savePayment($payment);
                }
            }
        }
    }

    /**
     * Gets the payment from Mollie
     * @return \Mollie\Api\Resources\Payment|null
     */
    public function getMolliePayment($paymentId)
    {
        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey($this->apiKey);

            // Get payment
            return $mollie->payments->get($paymentId);
        } catch (ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
            return null;
        } catch (Exception $e) {
            echo "General error: " . htmlspecialchars($e->getMessage());
            return null;
        }
    }

    /**
     * Gets user orders by email
     * @param $getEmail
     * @return array
     */
    public function getUserOrdersByEmail($getEmail): array
    {
        $orders = $this->orderRepository->getUserOrdersByEmail($getEmail);

        // Get mollie information
        foreach ($orders as $key => $order) {
            $molliePayment = $this->getMolliePayment($order->getMollieId());
            $order = $this->setOrderMollieInformation($order, $molliePayment);

            // If order is open or pending, get checkout url
            if ($order->getStatus() == 'open' || $order->getStatus() == 'pending') {
                if ($molliePayment->method == 'paypal') {
                    $order->setCheckoutUrl($molliePayment->_links->changePaymentState->href);
                } else {
                    $order->setCheckoutUrl($molliePayment->getCheckoutUrl());
                }
            } else if ($order->getStatus() == 'expired' || $order->getStatus() == 'failed' || $order->getStatus() == 'canceled') {
                // Delete order if expired, failed or canceled
                $this->orderRepository->deleteOrder($order->getOrderId());
                // Delete self from array
                unset($orders[$key]);
            }
        }

        return $orders;
    }

    /**
     * Gets order by mollie id
     * @param $mollieID
     * @return mixed
     */
    public function getOrderByMollieID($mollieID)
    {
        $order = $this->orderRepository->getOrderByMollieID($mollieID);

        $molliePayment = $this->getMolliePayment($order->getMollieId());
        $order = $this->setOrderMollieInformation($order, $molliePayment);

        // If order is open or pending, get checkout url
        if ($order->getStatus() == 'open' || $order->getStatus() == 'pending') {
            $order->setCheckoutUrl($molliePayment->getCheckoutUrl());
        } else if ($order->getStatus() == 'expired' || $order->getStatus() == 'failed' || $order->getStatus() == 'canceled') {
            // Delete order if expired, failed or canceled
            $this->orderRepository->deleteOrder($order->getOrderId());
        }

        return $order;
    }

    /**
     * Adds mollie information to order
     * @param $order
     * @param $molliePayment
     * @return mixed
     */
    function setOrderMollieInformation($order, $molliePayment): mixed
    {
        $order->setStatus($molliePayment->status);
        $order->setMethod($molliePayment->method);
        $order->setDescription($molliePayment->description);
        $order->setAmount($molliePayment->amount->value);
        $order->setCurrency($molliePayment->amount->currency);
        return $order;
    }
    public function generateInvoice($orderProducts, $orderId, $customerName)
    {
        $products = array();
        foreach ($orderProducts as $orderProduct) {
            $productInformation = $this->productService->getProductById($orderProduct['product_id']);
            $products[] = $productInformation;
        }
        $invoicePdf = $this->pdfService->generateInvoice($customerName, $products, $orderId);
        return $invoicePdf;
    }

    public function sendTickets($orderId)
    {
        $order = $this->getOrderById($orderId);
        $orderProducts = $this->getOrderProductsById($orderId);
        $customerName = $order->getBillingFirstName() . ' ' . $order->getBillingLastName();
        $ticketPdfs = array();

        //generate qrcodes for each ticket and add it to array
        foreach ($orderProducts as $orderProduct) {
            $qrcode = $this->qrCodeService->create($orderProduct['product_id'], $orderId);
            $product = $this->productService->getProductById($orderProduct['product_id']);
            $ticket = $this->pdfService->generatePdf($product, $qrcode);

            $ticketPdfs[] = $ticket;
        }
        //generate invoice and add to array
        $ticketPdfs[] = $this->generateInvoice($orderProducts, $orderId, $customerName);

        //get user email from the order details
        $userEmail = $order->getEmail();
        //send qrcodes as attachment in email
        $this->emailService->sendWithAttachment(
            'Your ticket purchase for The Festival was successful. 
            Find attached to this email, your ticket.

            We wish you a very enjoyable festival.

            Kind regards,
            Visit Haarlem ',
            $userEmail,
            $ticketPdfs,
            'Your tickets for The Festival',
            $orderId
        );
    }

    /**
     * Prepares the invoice with Mollie Payment information
     * @param $payment
     * @return void
     */
    public function prepareInvoice($payment): void
    {
        $order = $this->orderRepository->getOrderByMollieID($payment->id);
        $this->sendTickets($order->getOrderId());
    }

    public function getOrderIdByMollieId(mixed $mollieId)
    {
        return $this->orderRepository->getOrderIdByMollieId($mollieId);
    }
}