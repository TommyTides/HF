<?php
namespace App\Controllers;

use App\Services\OrderService;
use App\Services\ApiKeyService;
use App\Services\PaymentService;
use App\Services\PageEditorService;
use Exception;

class ApiController extends Controller
{
    private $apiKeyService;
    private $orderService;
    private $paymentService;
    private $pageEditorService;
    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->apiKeyService = new ApiKeyService();
        $this->paymentService = new PaymentService();
        $this->pageEditorService = new PageEditorService();
    }
    public function getAllOrders()
    {
        try {
            if (!$this->checkForValidApiKey()) {
                $this->respondWithError(404, "Invalid API key");
                return;
            }
            $orders = $this->orderService->getAllOrders();
            if ($orders) {
                $this->respond($orders);
            } else{
                $this->respondWithError(404, "No orders found");
            }
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    public function getOrderById($orderId)
    {
        try {
            if (!$this->checkForValidApiKey()) {
                return;
            }
            $order = $this->orderService->getOrderById($orderId);

            if ($order) {
                $this->respond(
                    array(
                        'id' => $order->getOrderId(),
                        'mollie_id' => $order->getMollieId(),
                        'billing_first_name' => $order->getBillingFirstName(),
                        'billing_last_name' => $order->getBillingLastName(),
                        'billing_street' => $order->getBillingStreet(),
                        'billing_house_number' => $order->getBillingHouseNumber(),
                        'billing_postal_code' => $order->getBillingPostalCode(),
                        'billing_city' => $order->getBillingCity(),
                        'billing_country' => $order->getBillingCountry(),
                        'timestamp' => $order->getTimestamp(),
                        'email' => $order->getEmail(),
                        'phone_number' => $order->getPhoneNumber(),

                    )
                );
            } else
                $this->respondWithError(404, "Order not found");
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getAllPayments()
    {
        try {
            if (!$this->checkForValidApiKey()) {
                return;
            }
            $payments = $this->paymentService->getAllPayments();
            if ($payments) {
                $this->respond($payments);
            } else
                $this->respondWithError(404, "No payments found");
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getOnePayment($id)
    {
        try {
            if (!$this->checkForValidApiKey()) {
                return;
            }
            $payment = $this->paymentService->getPaymentByid($id);
            if ($payment) {
                $this->respond($payment);
            } else
                $this->respondWithError(404, "No payment found");
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    public function checkForValidApiKey()
    {
        // Check for API key header
        if (!isset($_SERVER['HTTP_X_API_KEY'])) {
            $this->respondWithError(401, "No API key provided");
            return;
        }
        
        // Read API key from header
        $apiKey = $_SERVER['HTTP_X_API_KEY'];

        // Validate API key in service layer
        $validApiKey = $this->apiKeyService->validateAPIKey($apiKey);

        if ($validApiKey==false) {
            return false;
        }
        // API key is valid
        return true;
    }
    
}