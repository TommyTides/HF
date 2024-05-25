<?php
namespace App\Controllers;

use App\Services\CartService;
use App\Services\ProductService;
use App\Services\OrderService;
use App\Models\User;

class CartController
{
    private CartService $cartService;
    private ProductService $productService;
    private OrderService $orderService;

    public function __construct()
    {
        $this->cartService = new CartService();
        $this->productService = new ProductService();
        $this->orderService = new OrderService();
    }

    public function index(): void
    {
        require_once(__DIR__ . '/../views/cart/shoppingcart.php');
    }

    public function shoppingcart(): void
    {
        $productService = $this->productService;

        // If cart is shared
        if (isset($_GET['share']))
        {
            $isShared = true;

            // Get data of products in shopping cart to load into view
            $cartProducts = $this->cartService->getCartProductsByShareLink($_GET['share']);
        } else { // If cart is not shared
            $isShared = false;
            // Get data of products in shopping cart to load into view
            $cartProducts = $this->productService->getCartProducts();
        }

        // Get the subtotal, shipping cost and total
        $subtotal = $this->productService->getSubtotalPrice($cartProducts);
        $total = $this->productService->getTotalPrice($cartProducts);

        $enoughSeats = $this->cartService->checkEnoughSeats($cartProducts);
        require_once(__DIR__ . '/../views/cart/shoppingcart.php');
    }

    public function checkout(): void
    {
        // Get data of products in shopping cart to load into view
        $cartProducts = $this->productService->getCartProducts();

        if ($cartProducts == null) {
            header('location: /cart/shoppingcart');
            return;
        }

        // Get user data
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
        } else {
            $user = null;
        }

        // Get the subtotal, shipping cost and total to display
        $subtotal = $this->productService->getSubtotalPrice($cartProducts);
        $total = $this->productService->getTotalPrice($cartProducts);

        require_once(__DIR__ . '/../views/cart/checkout.php');
    }
 
    public function addtocart(): void
    {
        $this->cartService->addToCart();
    }

    public function editcart(): void
    {
        print json_encode($this->cartService->editCart($this->productService));
    }

    public function emptycart(): void
    {
        $this->cartService->emptyCart();
    }

    public function createlink(): void
    {
        echo json_encode($this->cartService->createLink());
    }

    public function payment(): void
    {
        if (isset($_POST['submit'])) {
            $_SESSION['confirmationData'] = $_POST;
        }

        // Create payment
        $payment = $this->orderService->createPayment();

        // Redirect
        $url = $payment->getCheckoutUrl();
        header('location: ' . $url);
    }

    public function process(): void
    {
        // Get temporary payment id
        $paymentId = $_SESSION['temp_payment_id'];

        // Get payment information
        $payment = $this->orderService->getMolliePayment($paymentId);

        // Process payment
        $this->orderService->processPayment($payment);

        // Display confirmation
        $this->confirmation($payment);
    }

    public function payopenorder(): void
    {
        // Set payment id from session
        $_SESSION['temp_payment_id'] = $_POST['payment_id'];

        // Redirect to payment
        $url = $_POST['payment_url'];
        header('location: ' . $url);
    }

    public function confirmation($payment): void
    {
        // Send email
        $this->orderService->prepareInvoice($payment);

        if ($payment->isPaid()) {
            // Clear cart
            $this->cartService->emptyCart();
        }
        require_once(__DIR__ . '/../views/cart/confirmation.php');
    }

    public function checkAmountSeats(): void
    {
        $cartProducts = $this->productService->getCartProducts();
        echo json_encode($this->cartService->checkEnoughSeats($cartProducts));
    }
}
