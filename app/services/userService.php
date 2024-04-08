<?php
namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\CartService;

class UserService
{
    private UserRepository $repository;
    private CartService $cartService;

    function __construct()
    {
        $this->repository = new UserRepository();
        $this->cartService = new CartService();
    }
    function getAll()
    {
        return $this->repository->getAll();
    }

    function getMaxEmployeeNumber(){
        return $this->repository->getMaxEmployeeNumber();
    }

    function registerUser($data)
    {
        $this->repository->registerUser($data);
    }
    function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }
     function validateUser(string $email, string $password) {
        $user = $this->repository->validateUser($email, $password);
       
        if(!$user){
            return null;
        }
        if (password_verify($password, $user->getPassword())) {
               // Set session cart to database cart
            $this->cartService->updateUserDatabaseCart($user);
            return $user;
        }
    }
    function insertTokenIntoDB($email, $token)
    {
        $expiration=date("Y-m-d H:i:s", strtotime("+1 hour"));
        $this->repository->insertTokenIntoDB($email, $token,$expiration);
    }
    public function validateResetToken($email, $token)
    {
        return $this->repository->validateResetToken($email, $token);
    }
    public function resetPassword($email, $password)
    {
        $this->repository->resetPassword($email, $password);
    }
    public function getUserById()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        return $this->repository->getUserById($id);
    }
    public function getAllUserTypes(){
        return $this->repository->getAllUserTypes();
    }

    public function updateUser($user): bool
    {
        $result = false;

        // Check if form was submitted
        if (isset($_POST)) {
            $userInfo = array(
                'first_name' => $_POST['firstName'],
                'last_name' => $_POST['lastName'],
                'street' => $_POST['street'],
                'house_number' => $_POST['house_number'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postal_code' => $_POST['zip'],
                'country' => $_POST['country'],
                'phone_number' => $_POST['phone_number'],
                'email' => $user->getEmail()
            );

            // Attempt to update
            $result = $this->repository->updateUser($userInfo);

            // If successful, update information
            if ($result) {
                // Update user with new database values
                $_SESSION['user'] = serialize($this->getUserByEmail($user->getEmail()));
                $updatedUser = unserialize($_SESSION['user']);
                $_SESSION['display_name'] = $updatedUser->getFirstName();
                $_SESSION['is_admin'] = $updatedUser->isAdmin();
                //echo $user;
            }
        }
        return $result;
    }
    public function getOneUserById($id){

        return $this->repository->getUserById($id);
    }
    
    public function deleteUser($id){
        $this->repository->deleteUser($id);
    }


}