<?php
namespace App\Controllers;

use App\Services\UserService;
use App\Services\CartService;
use App\Services\OrderService;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController
{
    private UserService $userService;
    private CartService $cartService;
    private OrderService $orderService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->cartService = new CartService();
        $this->orderService = new OrderService();
    }
    public function getAll()
    {
        $model = $this->userService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }
    public function login()
    {
        require_once(__DIR__ . "/../views/login/index.php");
    }
    public function register()
    {
        require_once(__DIR__ . "/../views/register/index.php");
    }
    public function forgotPassword()
    {
        require_once(__DIR__ . "/../views/forgotpassword/index.php");
    }
    public function resetPassword()
    {
        require_once(__DIR__ . "/../views/forgotpassword/resetpassword.php");
    }
    public function signUp()
    {
        if (isset($_POST['signUpBtn'])) {
            $email = htmlspecialchars($_POST['email_Register']);
            $user = $this->userService->getUserByEmail($email);
            if (is_array($user) && $user['email'] == $email) {
                $errorMessage = "Account is already registered.";
                echo "<script>alert('$errorMessage');</script>";
                echo "<script>location.href='/user/register'</script>";

                return;
            } else {
                $data = array(
                    'email' => htmlspecialchars($_POST['email_Register']),
                    'password' => password_hash(htmlspecialchars($_POST['password_Register']), PASSWORD_DEFAULT),
                    'first_name' => htmlspecialchars($_POST['firstname_Register']),
                    'last_name' => htmlspecialchars($_POST['lastname_Register']),
                    'postal_code' => htmlspecialchars($_POST['postcode_Register']),
                    'house_number' => htmlspecialchars($_POST['houseNumber_Register']),
                    'street' => htmlspecialchars($_POST['street_Register']),
                    'city' => htmlspecialchars($_POST['city_Register']),
                    'state' => htmlspecialchars($_POST['state_Register']),
                    'country' => htmlspecialchars($_POST['country_Register']),
                    'employee_number' => null,
                    'user_type' => 1 // 1 = customer, 2 = admin, 3 = employee
                );
            }
            $captcha = $this->verifyCaptcha();
            if ($captcha) {
                // Register user
                $this->userService->registerUser($data);
                echo "<script>alert('Account successfully registered.');</script>";
                echo "<script>location.href='/user/login'</script>";
            } else {
                $errorMessage = "Please complete the captcha before submitting the form.";
                echo "<script>alert('$errorMessage');</script>";
                echo "<script>location.href='/user/register'</script>";
                exit;
            }
        }
    }

    public function validateUser()
    {
        if (isset($_POST['login_Button'])) {
            $email = htmlspecialchars($_POST['email_Login']);
            $password = htmlspecialchars($_POST['password_Login']);
            $user = $this->userService->validateUser($email, $password);
            if (empty($user)) {
                echo " <script type='text/javascript'>alert('Invalid email or password. Please try again');</script>";
                echo "<script>location.href='/user/login'</script>";
            } else {
                $_SESSION['user'] = serialize($user);
                echo "<script>location.href='/home/index'</script>";
                echo " <script type='text/javascript'>alert('Login successful');</script>";
            }
        }
        return null;
    }

    public function verifyCaptcha()
    {
        if (isset($_POST['g-recaptcha-response'])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => '6Lct8bEkAAAAACKSzHVT1fOgrVnpRkNO-yLMpb0i', 
                'response' => $_POST['g-recaptcha-response']
            );

            $options = array(
                'http' => array(
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $response = json_decode($result, true);

            if ($response['success']) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function generateTokenAndInsertIntoDB()
    {

        if (isset($_POST['forgotPW_send'])) {
            $email = htmlspecialchars($_POST['forgotPW_email']);
            //check if email exists in db
            $user = $this->userService->getUserByEmail($email);

            if (isset($user) && $user->getEmail() == $email) {

                require __DIR__ . '/../views/forgotpassword/emailsent.php';
                //generate token
                $token = bin2hex(random_bytes(20));
                $this->userService->insertTokenIntoDB($token, $email);
                $this->sendPasswordLink($token, $email);

                echo "<script>alert('Email sent. Please check your inbox.');</script>";
                echo "<script>location.href='/user/login'</script>";
            } else {
                $errorMessage = "Email does not exist.";
                echo "<script>alert('$errorMessage');</script>";
                echo "<script>location.href='/user/forgotPassword'</script>";
            }
        }

    }

    public function sendPasswordLink($token, $emailAddress)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            require __DIR__ . '/../config/phpmailerconfig.php';
            // Instantiate a new PHPMailer object
            $mail = new PHPMailer;
            // Set the mailer to use SMTP
            $mail->isSMTP();

            // Specify the SMTP server details
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the sender and recipient email addresses
            $mail->setFrom($email, 'VisitHaarlem');
            $mail->addAddress($emailAddress, '');

            // Set the subject and message body
            $mail->Subject = 'Reset your password';
            $mail->Body = 'Hello,

            You recently requested to reset your password for our website. To complete the process, please click on the link below:
            
                http://localhost/user/verifyToken?email=' . $emailAddress . '&token=' . $token . '
            
            If you did not request a password reset, please ignore this email or contact us immediately at this email.
            
            Thank you,
            VisitHaarlem ';

            // Check if the email was sent successfully
            if (!$mail->send()) {
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo '<div class="alert alert-success" role="alert">Email has been sent.</div>';
            }
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function verifyToken()
    {
        //get email and token from url
        $email = $_GET['email'];
        $token = $_GET['token'];
        //check if token exists in db
        $isValidToken = $this->userService->validateResetToken($email, $token);
        if ($isValidToken) {
            //display reset password form
            require __DIR__ . '/../views/forgotpassword/resetpassword.php';
        } else {
            //display error message
            $errorMessage = "Your link reset has expired. Try again.";
            echo "<script>alert('$errorMessage');</script>";
            //redirect to login page
            echo "<script>location.href='/user/login'</script>";
        }
    }

    public function displayResetPasswordForm()
    {
        if (isset($_POST['resetPW_Button'])) {
            require __DIR__ . '/../views/forgotpassword/resetpassword.php';
        }
    }

    public function updatePasswordInDB()
    {
        //get email from hidden input in reset password form
        $email = $_POST['email'];
        $newPassword = htmlspecialchars($_POST['resetPW_password']);
        $confirmPassword = htmlspecialchars($_POST['resetPW_confirm']);

        if ($newPassword != $confirmPassword) {
            //display error message
            echo "<script>alert('Passwords do not match.');</script>";
            echo "<script>window.history.back();</script>";
            return;
        }
        $this->userService->resetPassword($email, $newPassword);
        echo "<script>alert('Password reset successfully.');</script>";
        echo "<script>location.href='/user/login'</script>";
    }

    public function account()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            require(__DIR__ . '/../views/user/account.php');
        } else {
            $this->login();
        }
    }

    public function editaccount()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            require(__DIR__ . '/../views/user/editaccount.php');
        } else {
            $this->login();
        }
    }

    public function updateuser()
    {
        //echo '<pre>' . var_export($_SESSION, true) . '</pre>';

        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            echo json_encode($this->userService->updateUser($user));
        } else {
            echo json_encode(false);
            echo 'Session user not set.';
        }
    }

    public function getCountry()
    {
        // Get user object
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
        } else {
            $user = null;
        }

        if ($user !== null && $user->getCountry() !== null) {
            echo json_encode(htmlspecialchars($user->getCountry()));
        } else {
            echo json_encode(null);
        }
    }

    public function orders()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            $orders = $this->orderService->getUserOrdersByEmail($user->getEmail());

            require(__DIR__ . '/../views/user/orders.php');
        } else {
            $this->login();
        }
    }
    
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}