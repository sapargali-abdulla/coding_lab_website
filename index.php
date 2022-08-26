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
        #review {
            width: 50%;
            float: left;
        }

        #reviewForm {
            background-color: white;
            border-radius: 20px;
            box-sizing: border-box;
            height: 70%;
            padding: 20px;
            margin-left: 20%;
            margin-top: 10%;
            width: 400px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }

        .subtitle {
            color: #252e37;
            font-family: sans-serif;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
            margin-top: 10%;
        }

        .input-container {
            height: 50px;
            position: relative;
            width: 100%;
        }

        .ic1 {
            margin-top: 40px;
        }

        .ic2 {
            margin-top: 30px;
        }

        .input {
            background-color: #303245;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100% !important;
        }

        .cut {
            background-color: white;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            transform: translateY(0);
            transition: transform 200ms;
            width: 130px;
        }

        .cut-short {
            width: 50px;
        }

        .input:focus ~ .cut,
        .input:not(:placeholder-shown) ~ .cut {
            transform: translateY(8px);
        }

        .placeholder {
            color: #65657b;
            font-family: sans-serif;
            left: 20px;
            line-height: 14px;
            pointer-events: none;
            position: absolute;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            top: 20px;
        }

        .input:focus ~ .placeholder,
        .input:not(:placeholder-shown) ~ .placeholder {
            transform: translateY(-30px) translateX(10px) scale(0.75);
        }

        .input:not(:placeholder-shown) ~ .placeholder {
            color: #808097;
        }

        .input:focus ~ .placeholder {
            color: black;
        }

        .submit {
            background-color: #252e37;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            margin-top: 38px;
        // outline: 0;
            text-align: center;
            width: 100%;
        }

        .submit:active {
            background-color: #2F3841FF;
        }
    </style>
</head>

<body>
<!--header-->
<div class="header">
    <div class="container">
        <!---->
        <div class="header-logo">
            <div class="logo">
                <a href="ModeratorPage/ModeratorPageLogin.php"><img src="images/logo.png" alt=""></a>
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
                <li><a href="ModeratorPage/ModeratorPage.php"><img src="images/logo.png" alt=""></a></li>
                <li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
                <li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
            </ul>
            <!--script-->
        </div>
        <div class="header-top">
            <img class="img-responsive" src="images/art.png" alt="">
            <h2>У вас мероприятие</h2>
            <p class="to-do">но некому накрыть на стол?</p>
            <h1>У нас есть решение! <span>Банкеты на заказ</span></h1>
            <p class="have">Мы все сделаем за вас!</p>
            <img class="img-responsive" src="images/ar.png" alt="">
        </div>
    </div>
</div>
<!---->
<div class="content">
    <div class="container">
        <div class="content-top">
            <div class="content-top-grid">
                <div class="col-md-6 content-top-bottom ">
                    <h3>Банкет</h3>
                    <p>Многие сталкивались со сложностями в организации мероприятии, дня рождения, юбилея или детского праздника. Столько разных звеньев нужно сложить в стройную цепочку. Банкет - дело хлопотное и может быть очень затратным. Важно продумать концепцию мероприятия, необходимо задолго до события подобрать подходящий банкетный зал или ресторан, обговорить меню, найти тамаду, ведущего, продумать развлекательную программу с различными шоу и музыкальными группами.</p>
                </div>
                <div class="col-md-6">
                    <a href="single.php"><img class="img-responsive" src="images/pic1.jpg" alt=""></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content-top-grid">
                <div class="col-md-7">
                    <a href="single.php"><img class="img-responsive" src="images/pic.jpg" alt=""></a>
                </div>
                <div class="col-md-5 content-top-at ">
                    <h3>Что предлагаем мы?</h3>
                    <p>Подберем повара, который приготовит на любой изысканный вкус. Представляем вам разные виды кухни:
                        Казахскую, Азиатскую, Европейскую. Повар составит меню с учетом особенностями ваших пожелании.
                        Сделает калькуляцию продуктов, составит праздничное меню и выполнит сервировку стола. <span>Это уникальная возможность избавить Вас и Ваших близких от суеты и хлопот! Мы проводим выездные мероприятия в удобном для Вас месте.</span>
                        <span>А также на нашем сайте вы можете найти контакты предоставляющих услуги посудомойщиц, официантов, аренды мебели и так далее.</span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!---->
    <div class="content-middle">
        <a href="single.php"><img class="img-responsive" src="images/pi1.png" alt=""></a>
        <p>Опытные покара которые сделают всё за вас,
            Almatypovar франшиза которая более 5 лет на рынке.
            Для того что б сделать запись на банкет нажмите на кнопку!</p>
        <a href="order.php" class="register">Сделать Запись!</a>
    </div>
    <!---->

    <div class="content-bottom">
        <div class="container">
            <h3>ОТЗЫВЫ</h3>
            <div class="col-md-6 name-in">
                <?php
                $i = 0;
                while ($row = $result->fetch_assoc() and $i < 3) {
                    $i++;
                    echo '<div class="bottom-in">
                         <p class="para-in">' . $row['review'] . '</p>
                         <i class="dolor"> </i>
                         <div class="men-grid">
                         <a href="#"><img class="img-responsive men-top" src="images/te2.jpg" alt=""></a>
                         <div class="men">
                         <span>' . $row['name'] . '</span>
                         <p>Клиент</p>
                         </div>
                         <div class="clearfix"></div>
                         </div>
                         </div>';
                }
                ?>
            </div>
            <div id="review" class="bottom-in">
                <form id="reviewForm" method="post" action="index.php">
                    <div class="subtitle">Напишите свой отзыв</div>
                    <div class="input-container ic1">
                        <input id="name" name="name" class="input" type="text" placeholder=" " required>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Напишите ваше имя</label>
                    </div>
                    <p></p>
                    <div class="input-container ic2">
                        <input id="review" name="review" class="input" type="text" placeholder=" " required>
                        <div class="cut"></div>
                        <label for="review" class="placeholder">Напишите ваш отзыв</label>
                    </div>
                    <p></p>
                    <button name="reviewSubmit" class="submit" type="submit">Оставить отзыв</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!---->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-4 amet-sed">
                <h4>almatypovar_banket</h4>
                <p class="flan">Город Алматы, Казахстан<span>
					Работаем по всему городу</span></p>
                <p>PHONE : <label>+7 707 758 41 82</label></p>
                <p>Instagram: <a href="almatypovar_banket">almatypovar_banket</a></p>
                <ul class="social-in">
                    <li><a href="https://wa.me/+77077584182/"><i> </i></a></li>
                    <li><a href="https://www.instagram.com/almatypovar_banket/"><i class="instagram"> </i></a></li>
                </ul>
            </div>
            <div class="col-md-3 amet-sed-box ">
                <ul class="nav-bottom">
                    <li><a href="about.php">О НАС</a></li>
                    <li><a href="order.php">ЗАКАЗАТЬ</a></li>
                    <li><a href="gallery.php">МЕНЮ </a></li>

                    <li><a href="contact.php">КОНТАКТЫ </a></li>
                </ul>
            </div>
            <div class="col-md-5 amet-sed-top ">
                <div class="enter">
                    <form method="post">
                        <input name="contact" type="text" value="Оставьте ваши контаты что бы мы свзались с вами"
                               onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required>
                        <input name="question" type="text"
                               value="Напишите свой вопрос для того что бы мы ответили на него"
                               onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                        <input name="questionSubmit" type="submit" value="">
                    </form>
                </div>
                <p>Для ответа на ваши вопросы, предложения, претензии вы можете оставить свои контактные данные для
                    того
                    что б наши операторы смогли с вами связаться
                    <span>Нам важен каждый клиент!</span></p>
            </div>
            <div class="clearfix"></div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $().UItoTop({easingType: 'easeOutQuart'});
                });
            </script>
            <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
            <!--скрипты для формы и датабазы-->
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>

            <?php
            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</div>
</body>
</html>