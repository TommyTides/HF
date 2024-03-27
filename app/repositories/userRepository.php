<?php
namespace App\Repositories;

use PDO;
use PDOException;
use Exception;
use App\Models\User;


class UserRepository extends Repository
{

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;

        } catch (PDOException $e) {
            throw new Exception("Error getting all users:" . $e->getMessage());
        }
    }
    function getMaxEmployeeNumber()
    {
        try {
            $stmt = $this->connection->prepare("SELECT MAX(employee_number) FROM users WHERE user_type = 2;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $employeeNumber = $stmt->fetchAll();

            return $employeeNumber;

        } catch (PDOException $e) {
            throw new Exception("Error getting max employee number:" . $e->getMessage());

        }
    }
    function registerUser($data)
    {
        $sql = "INSERT INTO Users (email, first_name, last_name, street, house_number, postal_code, city, state, country, password, employee_number, user_type) 
        VALUES (:email, :first_name, :last_name, :street, :house_number, :postal_code, :city, :state, :country, :password, :employee_number, :user_type)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $data['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $data['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':street', $data['street'], PDO::PARAM_STR);
        $stmt->bindValue(':postal_code', $data['postal_code'], PDO::PARAM_STR);
        $stmt->bindValue(':house_number', $data['house_number'], PDO::PARAM_STR);
        $stmt->bindValue(':city', $data['city'], PDO::PARAM_STR);
        $stmt->bindValue(':state', $data['state'], PDO::PARAM_STR);
        $stmt->bindValue(':country', $data['country'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindValue(':employee_number', $data['employee_number'], PDO::PARAM_INT);
        $stmt->bindValue(':user_type', $data['user_type'], PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Registering user failed: " . $e->getMessage());
        }
    }

    function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            // Display array results
            return $user;

        } catch (PDOException $e) {
            throw new Exception("Error getting user by email:" . $e->getMessage());
        }
    }
    function validateUser(string $email, string $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE Email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            
            return $user;

        } catch (PDOException $e) {
            throw new Exception("Error validating user:" . $e->getMessage());
        }
    }
    function insertTokenIntoDB($token, $email, $expiration)
    {
        //inserts date/time thats 1 hour from now
        try {
            $stmt = $this->connection->prepare("INSERT INTO password_reset_tokens (email, token, expiration) VALUES (:email, :token, :expiration)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expiration', $expiration);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Error inserting token into DB:" . $e->getMessage());
        }
    }
    function validateResetToken($email, $token)
    {
        try {
            $stmt = $this->connection->prepare("SELECT expiration FROM password_reset_tokens WHERE email = :email AND token = :token");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                // The token does not exist or is not associated with the specified email
                return false;
            }
            // Check if the token has expired
            $expiration = strtotime($row['expiration']);
            if (time() > $expiration) {
                return false;
            }
            // The token is valid and has not expired
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error validating token:" . $e->getMessage());
        }
    }
    function resetPassword($email, $password)
    {
        try {
            // Hash the password and update the user's password in db
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("UPDATE users SET password = :password WHERE email = :email");
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Delete the token from the database
            $stmt = $this->connection->prepare("DELETE FROM password_reset_tokens WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Error resetting password:" . $e->getMessage());
        }
    }
    public function getUserById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE user_id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->setfetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();

            $user = $stmt->fetch();
            // Display array results
            return $user;

        } catch (PDOException $e) {
            throw new Exception("Error getting user by id:" . $e->getMessage());
        }
    }

    public function getAllUserTypes()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user_type");
            $stmt->execute();

            $userTypes = $stmt->fetchAll();
            // Display array results
            return $userTypes;

        } catch (PDOException $e) {
            throw new Exception("Error getting all user types:" . $e->getMessage());
        }
    }

    public function updateUser(array $userInfo): bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name,
             street = :street, house_number = :house_number, city = :city, state = :state, 
             postal_code = :postal_code, country = :country, phone_number = :phone_number WHERE email= :email");
            $stmt->execute($userInfo);
            return true;
        } catch (PDOException $e) {
            error_log($e);
            return false;
        }
    }
    public function deleteUser($id){
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE user_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error deleting user:" . $e->getMessage());
        }
    }

}