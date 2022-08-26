<!DOCTYPE html>

<?php
include 'connectToTheDatabase.php';
?>

<html>
<head>
    <title>almatypovar_banket</title>

    <!-- 1. Подключить CSS-файл Bootstrap 3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type='text/javascript' src='js/select.js'></script>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Kitchen-Master Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
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
        body {
            background-image: url(images/food-background.jpg);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            overflow-x: hidden;
        }

        #ordersForm {
            width: 100%;
            margin-left: 200px;
        }

        select {
            margin-right: 40%;
            float: left;
            margin-bottom: 1%;
        }

        #submit {
            float: left;
            margin-right: 70%;
            margin-bottom: 20px;
            width: 15%;
            height: 15%;
            background-color: #252e37;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
        // outline: 0;
            text-align: center;
        }

        #submit:active {
            background-color: #2F3841FF;
        }
    </style>

</head>
<body>
<!--header-->
<div class="header-in">
    <div class="container">
        <!---->
        <div class="header-logo">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="top-nav">
                <span class="menu"> </span>
                <ul>
                    <li><a href="about.php" data-hover="О НАС">О НАС </a></li>
                    <li><a href="order.php" data-hover="ЗАКАЗАТЬ"> ЗАКАЗАТЬ</a></li>
                    <li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
                    <li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
                </ul>
                <!--script-->
                <script>
                    $("span.menu").click(function () {
                        $(".top-nav ul").slideToggle(500, function () {
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---->
        <div class="top-menu">
            <ul>
                <li><a href="about.php" data-hover="О НАС">О НАС </a></li>
                <li><a href="order.php" data-hover="ЗАКАЗАТЬ"> ЗАКАЗАТЬ</a></li>
                <li><a href="index.php"><img src="images/logo.png" alt=""></a></li>
                <li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
                <li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
            </ul>
            <!--script-->

        </div>
    </div>
</div>
<!---->


<form id="ordersForm" action="submitOrders.php" method="post">

    <h1>Оставить заказ</h1>
    <!-- Name -->
    <div class="content">
        <input type="text" id="name" name="name" placeholder="Напишите ваше имя" required>
    </div>
    <br/>
    <!-- Surname -->
    <div class="content">
        <input type="text" id="surname" name="surname" placeholder="Напишите вашу фамилию">
    </div>
    <br/>
    <!-- Contact -->
    <div class="content">
        <input type="text" id="contact" name="contact" placeholder="Напишите ваш номер телефона" required>
    </div>
    <br/>
    <!-- Address -->
    <div class="content">
        <input type="text" id="address" name="address" placeholder="Напишите ваш адресс" required>
    </div>
    <br/>

    <!-- Deadline -->
    <h4>Время проведения банкета</h4>
    <div class="content">
        <input type="datetime-local" id="deadline" name="deadline" required>
    </div>
    <br/>


    <!-- Wishes -->
    <div class="content">
        <textarea cols="35" rows="3" id="wishes" name="wishes"
                  placeholder="Напишите ваши пожелания, особенности проведения банкета"></textarea><br>
    </div>
    <!-- Amount of guests -->
    <h4>Количество гостей</h4>
    <div class="content">
        <input type="number" min="1" id="amount" name="amount" required>
    </div>
    <br/>
    <!-- Dishes -->
    <?php
    // Getting all dishes from database
    $select_statement = "SELECT category, name FROM dishes;";
    $result = $conn->query($select_statement);
    // Throw message if there's no result
    if (!$result) die("Result is empty");
    // Preparing arrays to store dishes
    $main_name_array = array();
    $salad_name_array = array();
    $snack_name_array = array();
    $dessert_name_array = array();
    // Storing dishes in arrays by categories
    while ($row = $result->fetch_assoc()) {
        if ($row['category'] == 'горячее') {
            $main_name_array[] = $row['name'];
        } else if ($row['category'] == 'салат') {
            $salad_name_array[] = $row['name'];
        } else if ($row['category'] == 'закуски') {
            $snack_name_array[] = $row['name'];
        } else if ($row['category'] == 'десерт') {
            $dessert_name_array[] = $row['name'];
        }
    }
    ?>
    <br>

    <!-- Main dishes 2 -->
    <div class="select">
        <?php
        $i = 0;
        while ($i < 2) {
            echo "<select name=\"main$i\">";
            echo "<option selected value> Выберите горячее блюдо </option>";
            foreach ($main_name_array as $row) {
                echo "<option value=\"$row\">$row</option>";
            }
            unset($row);
            echo '</select>';
            $i++;
        }
        ?>
    </div>
    <br>

    <!-- Salades 4 -->
    <div class="select">
        <?php
        $i = 0;
        while ($i < 4) {
            echo "<select name=\"salades$i\">";
            echo "<option selected value> Выберите салаты </option>";
            foreach ($salad_name_array as $row) {
                echo "<option value=\"$row\">$row</option>";
            }
            unset($row);
            echo '</select>';
            $i++;
        }
        ?>
    </div>
    <br>
    <!-- Snacks 4 -->
    <div class="select">
        <?php
        $i = 0;
        while ($i < 4) {
            echo "<select name=\"snacks$i\">";
            echo "<option selected value> Выберите закуски </option>";
            foreach ($snack_name_array as $row) {
                echo "<option value=\"$row\">$row</option>";
            }
            unset($row);
            echo '</select>';
            $i++;
        }
        ?>
    </div>
    <br>

    <!-- Desserts 3 -->
    <div class="select">
        <?php
        $i = 0;
        while ($i < 3) {
            echo "<select name=\"desserts$i\">";
            echo "<option selected value> Выберите Десерты </option>";
            foreach ($dessert_name_array as $row) {
                echo "<option value=\"$row\">$row</option>";
            }
            unset($row);
            echo '</select>';
            $i++;
        }
        ?>
    </div>

    <input id="submit" type="submit" name="submit" placeholder="Submit">
</form>




</body>
<!-- Script that prevents form from resubmitting after reload -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<!-- 3. Подключить библиотеку jQuery -->
<script src="js/jquery.min.js"></script>
<!-- 4. Подключить библиотеку moment -->
<script src="js/moment-with-locales.min.js"></script>
<!-- 5. Подключить js-файл фреймворка Bootstrap 3 -->
<script src="js/bootstrap.min.js"></script>
<!-- 6. Подключить js-файл библиотеки Bootstrap 3 DateTimePicker -->
<script src="js/bootstrap-datetimepicker.min.js"></script>

<!-- Closing connection -->
<?php
// Close the connection
$conn->close();
?>


</html>