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

$totalValue = 0;
$change = 0;

//display food when link is clicked
if (isset($_GET['food'])) {
    $change = $_GET['food'];
}
//display drinks when link is clicked
if (!$change) {
    $products = $drinks;
}
else {
    $products = $food;
}

//validate if email is filled in and valid
if (empty($_POST["email"])) {
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

    }
}


//check if streetnumber and zipcode are numbers
$streetnumber = $_POST['streetnumber'];
if (is_numeric($streetnumber)) { echo $streetnumber;} else {echo "Please use numbers only.";}
$zipcode = $_POST['zipcode'];
if (is_numeric($zipcode)) {echo $zipcode;} else {echo "Please use numbers only.";}



//get input
$street = testinput($_POST["street"]);
$streetnumber = testinput($_POST["streetnumber"]);
$city = testinput($_POST["city"]);
$zipcode = testinput($_POST["zipcode"]);

//save input
echo $email;
echo $$email;
echo $street;
echo $$street;
echo $city;
echo $$city;


echo "your email is" . $_SESSION['email'] . "cool rite";
echo $_SESSION['street'];
echo $_SESSION['streetnumber'];
echo $_SESSION['city'];
echo $_SESSION['zipcode'];



/*$email = $street = $streetnumber = $city = $zipcode = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = input($_POST["email"]);
    $street = input($_POST["street"]);
    $streetnumber = input($_POST["streetnumber"]);
    $city = input($_POST["city"]);
    $zipcode = input($_POST["zipcode"]);
}*/


if(isset($_POST['submit'])) {
    $_SESSION['email'] = $$email;
    $_SESSION['street'] = $$street;
    $_SESSION['streetnumber'] = $$streetnumber;
    $_SESSION['city'] = $$city;
    $_SESSION['zipcode'] = $$zipcode;
}



function testinput($data) {
    return $data;
}

require 'form-view.php';