<?php
//this line makes PHP behave in a more strict way
declare (strict_types=1);
//we are going to use session variables, so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
};
whatIsHappening();

//your products with their price.
    $food = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
    ];
    $drinks = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];


$link = 0;
//display food as default
if (isset($_GET['food'])) {
    $link = $_GET['food'];
}
//display products when link is clicked
if (!$link) {
    $products = $drinks;
}
else {
    $products = $food;
}

//check if checkboxes are checked
$totalValue = 0;
foreach ($products as $value) {
    if (empty($_POST["products"])) {
        echo "unchecked ";
    }
    else {
        echo "checked ";
    }
}

//give variables empty values
$email = $street = $streetnumber = $city = $zipcode = "";

//get input value
$street = input($_POST["street"]);
$streetnumber = input($_POST["streetnumber"]);
$city = input($_POST["city"]);
$zipcode = input($_POST["zipcode"]);

//validate input
function input($data) {
    //$data = trim($data);
    //$data = stripslashes($data);
    //$data = htmlspecialchars($data);
    return $data;
}


//calculate the delivery-time
if ('express_delivery' == 5) {
    $express_delivery = "Your delivery will be here in 45 minutes!";
    $totalValue = $totalValue + 5;
}
else {
    $express_delivery = "Your delivery will be here in about 2 hours.";
}


//validate if email is filled in and valid
/*if (empty($_POST["email"])) {
    $emailErr = "email is required";
    }
else {
    $email = $_POST["email"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z\d\._ ]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\._]{2,}+$/",$email)) {
        $emailErr = "Invalid email format";
    }else{
        $email = $_POST["email"];
        $_SESSION["email"]=$_POST["email"];
        echo "your email is" . $_SESSION['email'] . "cool rite";
    }
}*/


//check if streetnumber and zipcode are numbers
$streetnumber = $_POST['streetnumber'];
if (is_numeric($streetnumber)) { echo $streetnumber;} else {echo "Please use numbers only.";}
$zipcode = $_POST['zipcode'];
if (is_numeric($zipcode)) {echo $zipcode;} else {echo "Please use numbers only.";}


require 'form-view.php';