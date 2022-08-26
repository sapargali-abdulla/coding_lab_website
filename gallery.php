<!DOCTYPE html>
<?php
include 'connectToTheDatabase.php';
// SELECT statement
$select_statement = "SELECT 
                            id,
                            name,
                            picture,
                            category
                    FROM dishes;";
// Execute the SELECT statement
$result = $conn->query($select_statement);
// Throw message if there's no result
if (!$result) die("Result is empty");
// Preparing arrays to store dishes
$main_picture_array = array();
$salad_picture_array = array();
$snack_picture_array = array();
$dessert_picture_array = array();
// Storing dishes in arrays by categories
while ($row = $result->fetch_assoc()) {
    if ($row['picture'] != "green салат по-французский") {
        if (!is_null($row['picture']) && !empty($row['picture'])) {
            $dish_content = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'picture' => $row['picture']
            );
            if ($row['category'] == 'горячее') {
                array_push($main_picture_array, $dish_content);
            } else if ($row['category'] == 'салат') {
                array_push($salad_picture_array, $dish_content);
//                $salad_picture_array[$row['id']] = $row['picture'];
            } else if ($row['category'] == 'закуски') {
                array_push($snack_picture_array, $dish_content);
//                $snack_picture_array[$row['id']] = $row['picture'];
            } else if ($row['category'] == 'десерт') {
                array_push($dessert_picture_array, $dish_content);
//                $dessert_picture_array[$row['id']] = $row['picture'];
            }
        }
    }
}

function outputTheImages($arr) {
    foreach ($arr as $subarray) {
        echo
            '<div class="col-md-4 img-top">
                <div class="portfolio-wrapper">
                    <a class="b-link-stripe b-animate-go " onclick="displayIframe(' . $subarray['id'] . ')">
                        <img alt="" class="img-responsive" src="menu/' . $subarray['picture'] . '"/>
                        <span class="zoom-icon"></span>
                        <span class="dishName">' . $subarray['name'] . '</span>
                    </a>
                </div>
            </div>';
    }
}
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
    <link href="css/gallery.css" rel="stylesheet" type="text/css" media="all"/>
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
    <script src="js/move-top.js" type="text/javascript"></script>
    <script src="js/easing.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>

    <style>
        .dishName {
            font-family: Noto Sans KR;
        }

        .dishName:hover {
            text-decoration: none !important;
            color: orange;
        }

        #iframeDisplay {
            z-index: 1;
            width: 50%;
            margin-left: 35%;
            margin-right: 35%;
            padding: 10px;
        }

        #frame {
            position: fixed;
            z-index: 3;
            height: 80%;
            width: 30%;
        }

        .blur   {
            pointer-events: none;
            filter: blur(10px);
            color: #C0C0C0;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
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
                <li><a href="index.php"><img src="images/logo.png" alt=""></a></li>
                <li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
                <li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
            </ul>
            <!--script-->
        </div>
    </div>
</div>
<!---->
<div id="iframeDisplay"></div>
<div id="body">
<div class="container">
    <div id="product" class="product">
        <h2>Меню</h2>
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });

        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0;">
                <ul class="resp-tabs-list">
                    <li aria-controls="tab_item-0" class="resp-tab-item" role="tab"><span>Все</span></li>
                    /
                    <li aria-controls="tab_item-1" class="resp-tab-item" role="tab"><span>Горячее</span></li>
                    /
                    <li aria-controls="tab_item-2" class="resp-tab-item" role="tab"><span>Закуски</span></li>
                    /
                    <li aria-controls="tab_item-3" class="resp-tab-item" role="tab"><span>Салаты</span></li>
                    /
                    <li aria-controls="tab_item-4" class="resp-tab-item" role="tab"><span>Десерты</span></li>
                </ul>
                <div class="resp-tabs-container">
                    <div aria-labelledby="tab_item-0" class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <?php
                            outputTheImages($main_picture_array);
                            outputTheImages($dessert_picture_array);
                            outputTheImages($salad_picture_array);
                            outputTheImages($snack_picture_array);
                            ?>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <div aria-labelledby="tab_item-1" class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <?php
                            outputTheImages($main_picture_array);
                            ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div aria-labelledby="tab_item-2" class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <?php
                            outputTheImages($snack_picture_array);
                            ?>
                        </div>
                    </div>
                    <div aria-labelledby="tab_item-3" class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <?php
                            outputTheImages($salad_picture_array);
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div aria-labelledby="tab_item-4" class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <?php
                            outputTheImages($dessert_picture_array);
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        </div>
        <p class="footer-class">Copyright &copy; 2015 Kitchen-Master. All Rights Reserved Template by <a
                href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>
    <script>
        function displayIframe(id) {
            document.getElementById("iframeDisplay").innerHTML =
                "<iframe id='frame' src=\"single.php?dish_id=" + id + "\"></iframe>";
            myBlurFunction(1);
        }

        function closeIFrame(){
            $('#frame').remove();
            myBlurFunction(0);
        }

        var myBlurFunction = function(state) {
            /* state can be 1 or 0 */
            var containerElement = document.getElementById('body');
            var overlayEle = document.getElementById('iframeDisplay');

            if (state) {
                overlayEle.style.display = 'block';
                containerElement.setAttribute('class', 'blur');
            } else {
                overlayEle.style.display = 'none';
                containerElement.setAttribute('class', null);
            }
        };
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>

</div>

</body>
</html>