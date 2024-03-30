<?php
namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use App\Services\ProductService;
use App\Repositories\ProductRepository;


class CartService
{
    private CartRepository $cartRepository;
    private OrderRepository $orderRepository;
    private ProductService $productService;
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->orderRepository = new OrderRepository();
        $this->productService = new ProductService();
        $this->productRepository = new ProductRepository();
    }

    /**
     * Checks if a cart exists, or creates a session value for it
     */
    public function cartExists(): void
    {
        if (!isset($_SESSION['cart'])) {
            // Create cart
            $_SESSION['cart'] = array();
        }
    }

    /**
     * Update user database cart with session cart
     */
    public function updateUserDatabaseCart($user): void
    {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product) {
                $this->cartRepository->addItemToCart($user->getUserId(), $product['product_id'], $product['product_quantity']);
            }
            // Delete session cart
            unset($_SESSION['cart']);
        }
    }

    /**
     * Adds a product to the cart
     */
    public function addToCart(): void
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            $this->addToUserCart($user);
        } else {
            $this->addToGuestCart();
        }
    }

    /**
     * Adds a product to the cart of a logged-in user (Database)
     */
    private function addToUserCart($user): void
    {
        $this->cartRepository->addItemToCart($user->getUserId(), $_GET['product_id'], $_GET['product_quantity']);
    }

    /**
     * Adds a product to the cart of a guest (Session)
     */
    private function addtoGuestCart(): void
    {
        // Create cart if it doesn't exist yet
        $this->cartExists();

        if (isset($_GET['product_id']) && isset($_GET['product_price']) && isset($_GET['product_quantity'])) {
            // Get values
            $product_id = (int)$_GET['product_id'];
            $product_price = number_format((float)$_GET['product_price'],2);
            $product_quantity = (int)$_GET['product_quantity'];

            // Check if item doesn't exist, add new product
            if (!isset($_SESSION['cart'][$product_id]) == $product_id) {
                $_SESSION['cart'][$product_id] =
                    array(
                        'product_id' => $product_id,
                        'product_price' => $product_price,
                        'product_quantity' => $product_quantity
                    );
            } else {
                // Add to quantity
                $_SESSION['cart'][$product_id]['product_quantity'] += $product_quantity;
                // If maximum is exceeded, put maximum
                if ($_SESSION['cart'][$product_id]['product_quantity'] > 99) {
                    $_SESSION['cart'][$product_id]['product_quantity'] = 99;
                }
            }
        }
    }

    /**
     * Edits the cart with products or removes products.
     */
    public function editCart(ProductService $productService): ?array
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            return $this->editUserDatabaseCart($user, $productService);
        } else {
            return $this->editGuestCart($productService);
        }
    }

    /**
     * Edits the cart of a guest (Session)
     */
    private function editGuestCart(ProductService $productService): ?array
    {
        // Create cart if it doesn't exist yet
        $this->cartExists();

        if (isset($_GET['product_id']) && isset($_GET['product_quantity'])) {
            // Get values
            $product_id = (int)$_GET['product_id'];
            $product_quantity = (int)$_GET['product_quantity'];

            // Default value
            $deleteProduct = false;

            // If product exists
            if (isset($_SESSION['cart'][$product_id]) == $product_id) {
                // Update values
                if ($product_quantity > 0) { // If value is greater than 0, update
                    // In case of user attempting to enter higher number
                    if ($product_quantity > 99) {
                        $product_quantity = 99;
                    }

                    $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
                } else { // If value is 0, delete product from cart
                    unset($_SESSION['cart'][$product_id]);
                    $deleteProduct = true;
                }
            }

            // Get new values
            $totalQuantity = 10;//$navFunc->getCount();
            $cartProducts = $productService->getCartProducts();
            $subTotal = $productService->getSubtotalPrice($cartProducts);
            $total = $productService->getTotalPrice($cartProducts);
            $cartEmpty = empty($_SESSION['cart']);

            // Return new values
            return array(
                'deleteProduct' => $deleteProduct,
                'totalQuantity' => $totalQuantity,
                'subTotal' => $subTotal,
                'total' => $total,
                'cartEmpty' => $cartEmpty
            );
        }
        return null;
    }

    /**
     * Update user database cart
     */
    public function editUserDatabaseCart($user, ProductService $productService): ?array
    {
        if (isset($_GET['product_id']) && isset($_GET['product_quantity'])) {
            // Get cart ID from user
            $cartId = $this->cartRepository->getCartIdByUserId($user->getUserId());

            // Default value
            $deleteProduct = false;

            if ($_GET['product_quantity'] == 0) {
                $this->cartRepository->deleteItemFromCart($cartId, $_GET['product_id']);
                $deleteProduct = true;
            } else {
                $this->cartRepository->editItemInCart($cartId, $_GET['product_id'], $_GET['product_quantity']);
            }

            // Get new values
            $totalQuantity = 10;//$navFunc->getCount();
            $cartProducts = $productService->getCartProducts();
            $subTotal = $productService->getSubtotalPrice($cartProducts);
            $total = $productService->getTotalPrice($cartProducts);
            $cartEmpty = $cartProducts == null;

            // Return new values
            return array(
                'deleteProduct' => $deleteProduct,
                'totalQuantity' => $totalQuantity,
                'subTotal' => $subTotal,
                'total' => $total,
                'cartEmpty' => $cartEmpty
            );

        }
        return null;
    }

    /**
     * Empties the cart and overview data
     * Called after a successful payment
     */
    public function emptyCart(): void
    {
        // Empties cart & overview data
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            $this->cartRepository->emptyCartByUserId($user->getUserId());
        } else {
            unset($_SESSION['cart']);
            unset($_SESSION['confirmationData']);
        }
    }

    public function createLink(): string
    {
        // Get cart ID from logged-in user
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            // Get sharelink by user ID
            $sharelink = $this->cartRepository->getShareableLinkByUserId($user->getUserId());

            if ($sharelink == null) {
                // Create new sharelink
                $sharelink = $this->cartRepository->addShareableLink($user->getUserId());
            }

            // Return link with user cart id
            return $_SERVER['HTTP_HOST'] . '/cart/shoppingcart' . '?share=' . $sharelink;
        } else {
            return $_SERVER['HTTP_HOST'] . '/cart/shoppingcart';
        }
    }

    /**
     * Retrieves the cart products from the database by cart ID
     * @param mixed $cartid
     * @return mixed|null
     */
    public function getCartProductsByCartId(mixed $cartid): mixed
    {
        $cartProducts = $this->productRepository->getCartProductsByCartId($cartid);

        if ($cartProducts != null) {
            // Get event type and image for each product
            foreach($cartProducts as $cartProduct) {
                $cartProduct->setEventType($this->productRepository->getProductEventType($cartProduct->getEventId()));
                $cartProduct->setImage($this->productRepository->getProductImageById($cartProduct->getEventId()));
                $cartProduct->setNoOfSeats($this->productRepository->getAmountSeats($cartProduct->getEventId()));
            }
        }

        return $cartProducts;
    }

    public function getCartProductsByShareLink(mixed $sharelink)
    {
        $cartProducts = $this->productRepository->getCartProductsByShareLink($sharelink);

        if ($cartProducts != null) {
            // Get event type and image for each product
            foreach($cartProducts as $cartProduct) {
                $cartProduct->setEventType($this->productRepository->getProductEventType($cartProduct->getEventId()));
                $cartProduct->setImage($this->productRepository->getProductImageById($cartProduct->getEventId()));
                $cartProduct->setNoOfSeats($this->productRepository->getAmountSeats($cartProduct->getEventId()));
            }
        }

        return $cartProducts;
    }

    /**
     * Checks for enough seats in the database
     * @param $cartProducts
     * @return bool
     */
    public function checkEnoughSeats($cartProducts): bool
    {
        if ($cartProducts == null) {
            return false;
        }

        foreach ($cartProducts as $cartProduct) {
            $amountSeats = $this->productRepository->getAmountSeats($cartProduct->getEventId());
            if ($cartProduct->getAmount() > $amountSeats) {
                return false;
            }
        }
        return true;
    }
}
