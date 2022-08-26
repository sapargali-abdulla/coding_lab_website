<!DOCTYPE html>


<?php
include 'connectToTheDatabase.php';

// SELECT statement
$select_statement = "SELECT * FROM reviews ORDER BY id DESC;";
// Execute the SELECT statement
$result = $conn->query($select_statement);
// Submit review form to database
if (isset($_POST['reviewSubmit'])) {
    $name = $_POST['name'];
    $review = $_POST['review'];
    $insertStatement = 'INSERT INTO reviews (name, review) 
                        VALUES (\'' . $name . '\', \'' . $review . '\')';
    $conn->query($insertStatement);
    $result = $conn->query($select_statement);
}
// Submit question form to database
if (isset($_POST['questionSubmit'])) {
    $contact = $_POST['contact'];
    $question = $_POST['question'];
    $insertStatement = 'INSERT INTO Questions (contact, question) 
                        VALUES (\'' . $contact . '\', \'' . $question . '\')';
    $conn->query($insertStatement);
    $result = $conn->query($select_statement);
}
// Throw message if there's no result
if (!$result) die("Result is empty");
?>

<html>
<head>
<title>almatypovar_banket</title>

<style>
    body{
        background-image: url(../images/food-background.jpg);
    }
</style>


<!-- 1. Подключить CSS-файл Bootstrap 3 -->  
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type='text/javascript' src='js/select.js'></script>
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kitchen-Master Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".scroll").click(function(event){     
                            event.preventDefault();
                            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                        });
                    });
                    </script>

</head>
<body>



















<?php
// Checking if submit button is clicked
if (isset($_POST['submit'])) {
    include 'connectToTheDatabase.php';
    include 'calculationAlgorithm.php';

    // Submit orders to database
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $wishes = $_POST['wishes'];
    $deadline = $_POST['deadline'];
    // Making insert statement
    $insertStatement = "INSERT INTO order_details (client_name, client_surname, client_contact, address, deadline, wishes )
                        VALUES ('$name', '$surname', '$contact', '$address', '$deadline', '$wishes');";
    // Executing statement
    $conn->query($insertStatement);
    // Getting last id from order_details
    $id = $conn->insert_id;
    $amount = $_POST['amount'];
    // Submitting main dishes order
    checkAndSubmit($conn, 'main0', $amount, $id);
    checkAndSubmit($conn, 'main1', $amount, $id);
    // Submitting salades order
    checkAndSubmit($conn, 'salades0', $amount, $id);
    checkAndSubmit($conn, 'salades1', $amount, $id);
    checkAndSubmit($conn, 'salades2', $amount, $id);
    checkAndSubmit($conn, 'salades3', $amount, $id);
    // Submitting snacks order
    checkAndSubmit($conn, 'snacks0', $amount, $id);
    checkAndSubmit($conn, 'snacks1', $amount, $id);
    checkAndSubmit($conn, 'snacks2', $amount, $id);
    checkAndSubmit($conn, 'snacks3', $amount, $id);
    // Submitting desserts order
    checkAndSubmit($conn, 'desserts0', $amount, $id);
    checkAndSubmit($conn, 'desserts1', $amount, $id);
    checkAndSubmit($conn, 'desserts2', $amount, $id);
    // Closing the connection
    $conn->close();
    // Closing the window
}

// Function that checks if dish is ordered, if yes submit
function checkAndSubmit($conn, $name, $amount, $order_id) {
    if (isset($_POST["$name"])) {
        $selectStatement = "SELECT id FROM dishes WHERE name = '" . $_POST["$name"] . "' limit 1;";
        $result = $conn->query($selectStatement);
        $dish_id = $result->fetch_assoc();

        if ($dish_id['id'] != 0) {
            $insertStatement = "INSERT INTO orders (amount, order_id, dish_id)
                                VALUES ($amount, $order_id, '" . $dish_id['id'] . "');";
            $conn->query($insertStatement);
        }
    }
}



