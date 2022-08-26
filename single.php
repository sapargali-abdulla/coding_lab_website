<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
include_once "connectToTheDatabase.php";

$select_statement = "SELECT 
                                name,
                                picture,
                                content
                        FROM dishes
                        WHERE id = " . $_GET['dish_id'] . ";";
$dish = $conn->query($select_statement);
$dish = $dish->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>

    <style>
        .blog-top-in {
            padding-top: 0 !important;
        }

        #closeButton {
            z-index: 2;
            position: fixed;
            margin-top: 0;
            margin-left: 15px;
            color: black;
            background-color: Transparent;
            border: none;
            font-size: 35px;
            transition-duration: 0.5s;
            overflow: hidden;
        }

        #closeButton::before,
        #closeButton::after {
            background-color: red;
            content: '';
            display: block;
            height: 1px;
            left: 0;
            position: absolute;
            transition: all 0.2s ease-in;
            width: 100px;
            z-index: -1;
        }

        #closeButton::before {
            top: 0;
            transform: rotate(45deg);
        }

        #closeButton::after {
            bottom: 0;
            transform: rotate(-45deg);
        }

        #closeButton:hover {
            color: white;
        }

        #closeButton:hover::before,
        #closeButton:hover::after {
            height: 50px;
            transform: rotate(0deg);
        }

    </style>
</head>
<body>

<button id="closeButton" onclick="parent.closeIFrame();">X</button>

<div class="single">
    <div class="container">

        <div class="blog-top-in">

            <div class="col-md-4 top-blog">
                <a href="#"><img class="img-responsive" src="menu/<?php echo $dish['picture'] ?>" alt=" "></a>
            </div>
            <div class="col-md-8 sed-in">
                <h4><?php echo $dish['name']; ?></h4>
                <p><?php echo $dish['content'] ?></p>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
</body>
</html>