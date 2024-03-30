<?php
namespace App\Repositories;

use PDO;
use PDOException;

class CartRepository extends Repository
{
    /**
     * Checks if shopping cart exists for user
     * @param $userId ID of the user
     * @return false|mixed ID of the shopping cart or false if it does not exist
     */
    public function checkCartExists($userId): mixed
    {
        try {
            $stmt = $this->connection->prepare("SELECT shoppingcart_id FROM shoppingcarts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            $cartId = $stmt->fetchColumn();

            return $cartId ? $cartId : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Adds item to shopping cart
     * @param $productId ID of the product to add
     * @param $userId ID of the user
     */
    public function addItemToCart($userId, $productId, $amount = 1)
    {
        try {
            $cartId = $this->checkCartExists($userId);

            if ($cartId) {
                // Shopping cart exists, so check if the product already exists
                $stmt = $this->connection->prepare("SELECT amount FROM shoppingcart_product WHERE shoppingcart_id = :cart_id AND product_id = :product_id");
                $stmt->bindParam(':cart_id', $cartId);
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
                $existingAmount = $stmt->fetchColumn();

                if ($existingAmount) {
                    // Product already exists, so update the amount
                    $newAmount = $existingAmount + $amount;
                    $stmt = $this->connection->prepare("UPDATE shoppingcart_product SET amount = CASE WHEN :new_amount <= 10 THEN :new_amount ELSE amount END WHERE shoppingcart_id = :cart_id AND product_id = :product_id");
                    $stmt->bindParam(':cart_id', $cartId);
                    $stmt->bindParam(':product_id', $productId);
                    $stmt->bindParam(':new_amount', $newAmount, PDO::PARAM_INT);
                } else {
                    // Product does not exist, so create a new entry
                    $stmt = $this->connection->prepare("INSERT INTO shoppingcart_product (shoppingcart_id, product_id, amount) VALUES (:cart_id, :product_id, :amount)");
                    $stmt->bindParam(':cart_id', $cartId);
                    $stmt->bindParam(':product_id', $productId);
                    $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
                }
                $stmt->execute();
            } else {
                // Shopping cart does not exist, so create a new cart and add the product
                $this->connection->beginTransaction();

                $stmt = $this->connection->prepare("INSERT INTO shoppingcarts (user_id) VALUES (:user_id)");
                $stmt->bindParam(':user_id', $userId);
                $stmt->execute();

                $cartId = $this->connection->lastInsertId();

                $stmt = $this->connection->prepare("INSERT INTO shoppingcart_product (shoppingcart_id, product_id, amount) VALUES (:cart_id, :product_id, :amount)");
                $stmt->bindParam(':cart_id', $cartId);
                $stmt->bindParam(':product_id', $productId);
                $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
                $stmt->execute();

                $this->connection->commit();
            }
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Get shopping cart by ID
     */
    public function getCartById($cartId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM shoppingcarts WHERE shoppingcart_id = :cart_id");
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Get shopping cart by user ID
     */
    public function getCartByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM shoppingcarts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Get cart ID by user ID
     */
    public function getCartIdByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT shoppingcart_id FROM shoppingcarts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Edit item in shopping cart
     */
    public function editItemInCart($cartId, $productId, $amount)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE shoppingcart_product SET amount = :amount WHERE shoppingcart_id = :cart_id AND product_id = :product_id");
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Delete item from shopping cart
     */
    public function deleteItemFromCart($cartId, $productId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM shoppingcart_product WHERE shoppingcart_id = :cart_id AND product_id = :product_id");
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Empty shopping cart from user by user ID
     */
    public function emptyCartByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM shoppingcart_product WHERE shoppingcart_id = (SELECT shoppingcart_id FROM shoppingcarts WHERE user_id = :user_id)");
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    public function addShareableLink(mixed $userId): ?string
    {
        try {
            $sharelink = uniqid();
            $stmt = $this->connection->prepare("UPDATE shoppingcarts SET `sharelink` = :sharelink WHERE `user_id` = :user_id");
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':sharelink', $sharelink);
            $stmt->execute();
            return $sharelink;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Get shareable link by user ID
     * @param $userId
     * @return mixed|null
     */
    public function getShareableLinkByUserId($userId): mixed
    {
        try {
            $stmt = $this->connection->prepare("SELECT sharelink FROM shoppingcarts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}