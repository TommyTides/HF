<?php
namespace App\Controllers;

use App\Services\LocationService;
use App\Services\EventService;
use App\Services\UserService;
use App\Models\Location;
use App\Services\EmailService;
use App\Services\ArtistService;
use App\Services\OrderService;
use App\Services\APIKeyService;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Order;
use App\Services\PageEditorService;
/**
 * Summary of AdminController
 */
require_once(__DIR__ . '/../services/PageEditorService.php');

/**
 * Summary of AdminController
 */
class AdminController
{
    private $emailService;
    private $locationService;
    private $artistService;
    private $eventService;
    private $userService;
    private $orderService;
    private $apiKeyService;
    private PageEditorService $pageEditorService;

    public function __construct()
    {
        $this->apiKeyService = new APIKeyService();
        $this->emailService = new EmailService();
        $this->orderService = new OrderService();
        $this->locationService = new LocationService();
        $this->eventService = new EventService();
        $this->userService = new UserService();
        $this->artistService = new ArtistService();
        $this->pageEditorService = new PageEditorService();
    }

    public function editor(): void
    {
        $customPages = $this->pageEditorService->getAllPagesWhereNameIsNotNull();
        require_once __DIR__ . '/../views/admin/editor.php';
    }

    public function createPage()
    {
        $path = $_POST['path'] ?? '';
        $container = $_POST['container'] ?? '';
        $html = $_POST['html'] ?? '';
        $name = $_POST['name'] ?? '';
        
        $response = $this->pageEditorService->createPage($path, $container, $html, $name);
        echo json_encode($response);
    }

    public function tinymceUpdate(): void
    {
        $id = $_POST['id'] ?? '';
        echo $this->pageEditorService->UpdatePage();
    }

    //delete custom page
    public function getAllPagesWhereNameIsNotNull()
    {
        $response = $this->pageEditorService->getAllPagesWhereNameIsNotNull();
        $array = array();
        foreach ($response as $page) {
            $array[] = $page->getName();
            $array[] = $page->getId();
        }
        echo json_encode($array);
    }

    private function isAdmin(): void
    {
        if (isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            if($user->getUserType() == 1){
                echo "<script>window.location.href = '/';</script>";
            }
        }else{
            echo "<script>window.location.href = '/';</script>";
        }
    }
    public function dashBoard()
    {
        $this->isAdmin();
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }


    /* LOCATION CRUD OPERATIONS */

    public function manageLocations()
    {
        $this->isAdmin();
        $locations = $this->locationService->getAll();
        require_once(__DIR__ . '/../views/admin/managelocations/index.php');
    }
    public function createLocation(): void
    {
        $this->isAdmin();
        $events = $this->eventService->getAllEvents();
        require_once __DIR__ . '/../views/admin/managelocations/createlocation.php';
    }

    public function editlocation(): void
    {
        $this->isAdmin();
        $location = $this->locationService->getLocationById();
        $events = $this->eventService->getAllEvents();
        $primaryImage = $this->locationService->getLocationPrimaryImage($location->getLocationId());
        require_once __DIR__ . '/../views/admin/managelocations/updatelocation.php';
    }

    public function createNewLocation()
    {
        $this->isAdmin();
        $bannerImage = "";
        $event_id = "";

        if (isset($_POST['createLocationBtn'])) {
            $newLocation = new Location();
            // Set the properties of the new Location object
            $newLocation->setName(htmlspecialchars($_POST['name'], ENT_QUOTES));
            $newLocation->setSublocation(htmlspecialchars($_POST['sublocation'], ENT_QUOTES));
            $newLocation->setDescription(htmlspecialchars($_POST['description'], ENT_QUOTES));
            $newLocation->setMotto(htmlspecialchars($_POST['motto'], ENT_QUOTES));
            $newLocation->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES));
            $newLocation->setPhoneNumber(htmlspecialchars($_POST['phone_number'], ENT_QUOTES));
            $newLocation->setPhoneNumber2(htmlspecialchars($_POST['phone_number_2'], ENT_QUOTES));
            $newLocation->setWebsite(htmlspecialchars($_POST['website'], ENT_QUOTES));
            $newLocation->setAddress1(htmlspecialchars($_POST['address_1'], ENT_QUOTES));
            $newLocation->setPostalCode(htmlspecialchars($_POST['postal_code'], ENT_QUOTES));
            $newLocation->setCity(htmlspecialchars($_POST['city'], ENT_QUOTES));
            $newLocation->setSchedule(htmlspecialchars($_POST['schedule'], ENT_QUOTES));
            $event_id = $_POST['event'];
            $imageName = $_FILES['locationImage'];
            $detailImages = $_FILES['detailImages'];
            //move the image to the correct folder and rename it
            $bannerImage = $this->movePictures($imageName, "-primary");
            $renamedDetailImages = $this->movePictures($detailImages, "-detail");

            //insert images in to db and get the ids
            $imageIds = $this->insertBannerAndDetailImagesIntoDB($bannerImage, $renamedDetailImages);
        }
        //insert the location into the db and get the id
        $locationId = $this->locationService->createNewLocation($newLocation);

        // Insert event type into the event location table to link the location to an event
        $this->locationService->InsertEventLocation($event_id, $locationId);

        //connect location to the image in the db
        foreach ($imageIds as $id) {
            $this->locationService->insertLocationImage($id, $locationId);
        }
        echo "<script>alert('Location created!')</script>";
    }

    public function insertBannerAndDetailImagesIntoDB($bannerImage, $detailImages)
    {
        $this->isAdmin();
        $imageIds = array();
        if ($bannerImage == null || $detailImages == null) {
            echo "<script>alert('Please select an image file')</script>";
            return;
        }
        //insert the banner image into the db and get the id
        foreach ($bannerImage as $image) {
            $imageId = $this->locationService->insertImage($image);
            array_push($imageIds, $imageId);
        }
        //insert the detail images into the db and get the id
        foreach ($detailImages as $image) {
            $imageId = $this->locationService->insertImage($image);
            array_push($imageIds, $imageId);
        }
        return $imageIds;
    }

    public function updateLocation()
    {
        $this->isAdmin();
        $imageIds = array();
        if (isset($_POST['updateLocationBtn'])) {

            $location = new Location();
            $location->setName(htmlspecialchars($_POST['updateName'], ENT_QUOTES));
            $location->setSublocation(htmlspecialchars($_POST['updateSublocation'], ENT_QUOTES));
            $location->setDescription(htmlspecialchars($_POST['updateDescription'], ENT_QUOTES));
            $location->setMotto(htmlspecialchars($_POST['updateMotto'], ENT_QUOTES));
            $location->setEmail(htmlspecialchars($_POST['updateEmail'], ENT_QUOTES));
            $location->setPhoneNumber(htmlspecialchars($_POST['updatePhone_number'], ENT_QUOTES));
            $location->setPhoneNumber2(htmlspecialchars($_POST['updatePhone_number_2'], ENT_QUOTES));
            $location->setWebsite(htmlspecialchars($_POST['updateWebsite'], ENT_QUOTES));
            $location->setAddress1(htmlspecialchars($_POST['updateAddress_1'], ENT_QUOTES));
            $location->setPostalCode(htmlspecialchars($_POST['updatePostal_code'], ENT_QUOTES));
            $location->setCity(htmlspecialchars($_POST['updateCity'], ENT_QUOTES));
            $location->setSchedule(htmlspecialchars($_POST['updateSchedule'], ENT_QUOTES));
            $location->setLocationId(htmlspecialchars($_POST['locationID'], ENT_QUOTES));
        }
        $this->locationService->updateLocation($location);
        echo "<script>location.href='/admin/manageLocations'</script>";
    }

    public function deleteLocation()
    {
        $this->isAdmin();
        $this->locationService->deleteLocation();
        echo "<script>alert('Location deleted!')</script>";
        echo "<script>location.href='/admin/manageLocations'</script>";
    }

    /**
     * Summary of movePictures
     * moves images from temp folder to images folder and renames them
     * @param mixed $imageFiles - array of images
     * @param mixed $imageType - used to identify the type of image (primary or detail) which is stored in db
     * @return array<string>|bool
     */
    public function movePictures($imageFiles, $imageType)
    {
        $this->isAdmin();
        $validExtensions = array('jpeg', 'jpg', 'png', 'gif');
        $uploadedFiles = array();

        foreach ($imageFiles['tmp_name'] as $key => $tmp_name) {
            $fileName = $imageFiles['name'][$key];
            $tempName = $imageFiles['tmp_name'][$key];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $bannerImage = uniqid() . $imageType . '.' . $ext;

            if (!in_array($ext, $validExtensions)) {
                echo '<div class="alert alert-danger" role="alert">
                Incorrect file type. Please upload an image with a JPEG, JPG, PNG, or GIF extension.
              </div>';
                return false;
            }

            $location = $_SERVER['DOCUMENT_ROOT'] . "/images/";
            if (!move_uploaded_file($tempName, $location . $bannerImage)) {
                echo 'Error uploading file: ' . $fileName;
                return false;
            }
            $uploadedFiles[] = $bannerImage;
        }
        return $uploadedFiles;
    }

    /* EVENTS CRUD OPERATIONS */

    public function manageEvents()
    {
        $this->isAdmin();
        $events = $this->eventService->getAllEvents();
        require_once(__DIR__ . '/../views/admin/manageevents/index.php');
    }
    public function editEvent()
    {
        $this->isAdmin();
        $locations = $this->locationService->getAll();
        $event = $this->eventService->getEvent();
        $eventTypes = $this->eventService->getAllEventTypes();
        $eventImage = $this->eventService->getEventImage();
        require_once(__DIR__ . '/../views/admin/manageevents/editevent.php');
    }
    public function createEvent()
    {
        $this->isAdmin();
        $locations = $this->locationService->getAll();
        $eventTypes = $this->eventService->getAllEventTypes();
        require_once(__DIR__ . '/../views/admin/manageevents/createevent.php');
    }
    public function updateEvent()
    {
        $this->isAdmin();
        $event = new Event();
        $event->setName(htmlspecialchars($_POST['updateName'], ENT_QUOTES));
        $event->setDescription(htmlspecialchars($_POST['updateDescription'], ENT_QUOTES));
        $event->setSubDescription(htmlspecialchars($_POST['updateSubDescription'], ENT_QUOTES));
        $event->setEndTime(htmlspecialchars($_POST['updateEndDateTime'], ENT_QUOTES));
        $event->setStartTime(htmlspecialchars($_POST['updateStartDateTime'], ENT_QUOTES));
        $event->setEventType(htmlspecialchars($_POST['eventTypeId'], ENT_QUOTES));
        $event->setEventId(htmlspecialchars($_POST['eventId'], ENT_QUOTES));
        $event->setNo_of_seats(htmlspecialchars($_POST['noOfSeats'], ENT_QUOTES));
        $eventLocation = $_POST['eventLocation'];

        // update event location when updated
        $this->eventService->updateEventLocation($eventLocation);

        $this->eventService->updateEvent($event);
        echo "<script>alert('Event updated!')</script>";
        echo "<script>location.href='/admin/manageEvents'</script>";
    }
    public function addEvent()
    {
        $this->isAdmin();
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'sub_description' => $_POST['subDescription'],
            'start_time' => $_POST['startDateTime'],
            'end_time' => $_POST['endDateTime'],
            'event_type' => $_POST['eventType'],
            'no_of_seats' => $_POST['noOfSeats'],
        ];
        $eventLocation = $_POST['eventLocation'];
        //get images and move them to folder
        $imageName = $_FILES['eventImageBanner'];
        $newImageName = $this->movePictures($imageName, "-primary");
        //insert image into db and get id
        $imageId = $this->locationService->insertImage($newImageName[0]);
        //insert event and get id 
        $eventId = $this->eventService->createEvent($data);
        //insert event and image ids into event_image table
        $this->eventService->InsertEventImage($eventId, $imageId);
        //insert event and location ids into event_location table
        $this->locationService->InsertEventLocation($eventId, $eventLocation);

        echo "<script>alert('Created event successfully!')</script>";
        echo "<script>location.href='/admin/manageevents'</script>";

    }
    public function deleteEvent()
    {
        $this->isAdmin();
        $this->eventService->deleteEvent();
        echo "<script>alert('Event deleted!')</script>";
        echo "<script>location.href='/admin/manageevents'</script>";
    }

    public function addArtist()
    {
        $this->isAdmin();
        if(isset($_POST['artist_name'])){
            $artist = new Artist();
            $eventType = $this->danceTypeToInt($_POST["event_type"]);
            $artist->withAttr(null, $_POST["artist_name"], $_POST["first_name"], $_POST["last_name"], $_POST["biography"], $_POST["member_description"], $eventType);
            $this->artistService->insertArtist($artist);
        }
        require(__DIR__ . '/../views/admin/manageartists/addArtist.php');
    }

    public function artistsTable()
    {
        $this->isAdmin();
        if(isset($_POST['artist_id'])){
            $artist = new Artist ();
            $artist->withAttr($_POST["artist_id"], $_POST["artist_name"], $_POST["first_name"], $_POST["last_name"], $_POST["biography"], $_POST["member_description"], $_POST["event_type"]);
            $this->artistService->updateArtist($artist);
        }
        if(isset($_GET['id'])){
            $this->artistService->deleteArtist($_GET['id']);
        }
        $artists = $this->artistService->getAll();
        require(__DIR__ . '/../views/admin/manageartists/artistsTable.php');
    }
    
    public function orders()
    {
        $this->isAdmin();
        $queryResult = $this->orderService->getAllOrders();

        $orders = array();
        foreach($queryResult as $row){
            $order = new Order();
            $order->setOrderId($row['order_id']);
            $order->setMollieId($row['mollie_id']);
            $order->setStatus($this->orderService->getMolliePayment($row['mollie_id'])->status);
            $order->setCheckoutUrl($this->orderService->getMolliePayment($row['mollie_id'])->getCheckoutUrl());
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
        require(__DIR__ . '/../views/admin/manageorders/orders.php');
    }
    public function editOrder()
    {
        $this->isAdmin();

        if(isset($_POST['submit'])){
            $order = new Order();
            $order->setOrderId($_POST['order_id']);
            $order->setEmail($_POST['email']);
            $order->setMollieId($_POST['mollie_id']);
            $order->setPhoneNumber($_POST['phone_number']);
            $order->setBillingFirstName($_POST['billing_first_name']);
            $order->setBillingLastName($_POST['billing_last_name']);
            $order->setBillingStreet($_POST['billing_street']);
            $order->setBillingPostalCode($_POST['billing_postal_code']);
            $order->setBillingCity($_POST['billing_city']);
            $order->setStatus($_POST['order_status']);

            $this->orderService->updateOrder($order);

            echo "<script>location.href='/admin/orders'</script>";
        }

        $order = $this->orderService->getOrderById($_GET['id']);
        $order->setStatus($this->orderService->getMolliePayment($order->getMollieId())->status);

        require_once(__DIR__ . '/../views/admin/manageorders/editOrder.php');
    }

    public function danceTypeToInt($danceType)
    {
        switch($danceType){
            case "Dance":
                return 1;
            case "Jazz":
                return 2;
        }
    }

    /* USER CRUD OPERATIONS */

    public function manageUsers()
    {
        $this->isAdmin();
        $users = $this->userService->getAll();
        require_once(__DIR__ . '/../views/admin/manageusers/index.php');
    }
    public function editUser()
    {
        $this->isAdmin();
        $user = $this->userService->getUserById();
        $usertypes = $this->userService->getAllUserTypes();
        require_once(__DIR__ . '/../views/admin/manageusers/edituser.php');
    }
    public function createUser()
    {
        $this->isAdmin();
        $usertypes = $this->userService->getAllUserTypes();
        require_once(__DIR__ . '/../views/admin/manageusers/createuser.php');
    }
    public function addNewUser()
    {
        $this->isAdmin();
        $email = htmlspecialchars($_POST['email']);
        $user = $this->userService->getUserByEmail($email);
        if (is_array($user) && $user['email'] == $email) {
            // Display error message
            $errorMessage = "Account is already registered.";
            echo "<script>alert('$errorMessage');</script>";
            // Redirect to register page
            echo "<script>window.</script>";
            return;
        } else {
            $data = array(
                'email' => htmlspecialchars($_POST['email']),
                'password' => password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT),
                'first_name' => htmlspecialchars($_POST['firstname']),
                'last_name' => htmlspecialchars($_POST['lastname']),
                'postal_code' => htmlspecialchars($_POST['postcode']),
                'house_number' => htmlspecialchars($_POST['houseNumber']),
                'street' => htmlspecialchars($_POST['street']),
                'city' => htmlspecialchars($_POST['city']),
                'state' => htmlspecialchars($_POST['state']),
                'country' => htmlspecialchars($_POST['country']),
                'employee_number' => null,
                'user_type' => htmlspecialchars($_POST['userType']) // 1 = customer, 2 = admin, 3 = employee
            );
            $this->userService->registerUser($data);

        }
    }

    public function deleteUser(){
        $id=$_GET['id'];
        $this->userService->deleteUser($id);
        echo "<script>location.href='/admin/manageUsers'</script>";
    }

    public function showAPIKeys()
    {
        $this->isAdmin();
        $apikeys = $this->apiKeyService->getAllKeys();
        require_once(__DIR__ . '/../views/admin/apikeys/index.php');
    }

    public function createKey()
    {
        $this->isAdmin();
        require __DIR__ . '/../views/admin/apikeys/createKey.php';
    }
    public function deleteApiKey(){
        $this->isAdmin();
        $id=$_GET['id'];
        $this->apiKeyService->deleteKey($id);
        echo "<script>location.href='/admin/showApiKeys'</script>";
    }
    public function insertApiKey()
    {
        $this->isAdmin();
        $userEmail = unserialize($_SESSION['user'])->getEmail();
        $key = $this->apiKeyService->generateAPIKey();
        $this->apiKeyService->insertAPIKey($key);
        $subject = "API key request";
        $message = "Your API key request was successful. Your API key is: " . $key->getApi_key();
        if (isset($_POST['emailAddress'])) {
            $emailAddress = $_POST['emailAddress'];
            $this->emailService->Send($emailAddress, $message, $subject);
        } else {
            $this->emailService->Send($userEmail, $message, $subject);
        }
        echo "<script>alert('API key has been sent to your email!')</script>";
        echo "<script>location.href='/admin/showApiKeys'</script>";
    }
    public function deleteCustomPage(){
        $this->isAdmin();
        $id = $_POST['id'] ?? '';
        $this->pageEditorService->deletePage($id);
        echo "<script>location.href='/admin/editor'</script>";
    }
}