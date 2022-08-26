
<!DOCTYPE html>


<?php
include_once 'connectToTheDatabase.php';
?>



<html>
<head>

    <style>
        #contactsTable {
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>



<title>almatypovar_banket</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/tables.css" rel="stylesheet" type="text/css" media="all" />			
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<!--header-->
	<div class="header-in">
		<div class="container">	
				<!---->
			<div class="header-logo">
				<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" ></a>
				</div>
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li ><a href="about.php" data-hover="О НАС">О НАС  </a> </li>
						<li><a href="order.php" data-hover="ЗАКАЗАТЬ" > ЗАКАЗАТЬ</a></li>
						<li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
						<li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>				
		</div>
		<div class="clearfix"> </div>
			</div>
			<!---->
				<div class="top-menu">					
					<ul>
						<li ><a href="about.php" data-hover="О НАС">О НАС  </a> </li>
						<li><a href="order.php" data-hover="ЗАКАЗАТЬ" > ЗАКАЗАТЬ</a></li>
						<li><a href="index.php"><img src="images/logo.png" alt="" ></a></li>
						<li><a href="gallery.php" data-hover="МЕНЮ">МЕНЮ </a></li>
						<li><a href="contact.php" data-hover="КОНТАКТЫ">КОНТАКТЫ </a></li>
					</ul>
					<!--script-->
							
		</div>
	</div>
</div>











		<!---->
		<table id="contactsTable" class="CONTACTS">
			<thead>
    			<tr>
    			  <th>Имя</th>
    			  <th>Работа</th>
    			  <th>Телефон</th>
    			  <th>Почта</th>
    			</tr>
  			</thead>


  			<tbody>
					<?php
            $sql = 'SELECT job, name, contact_number, email FROM employees';
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['job'] . '</td>';
                echo '<td>' . $row['contact_number'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '</tr>';
            }
            unset($row);
            $result->close();
            $conn->close();
            ?>
            ...
        	</tbody>


			</table>






	<!---->	
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-4 amet-sed">
				<h4>almatypovar_banket</h4>
				<p class="flan">Город Алматы, Казахстан<span>
					Работаем по всему городу</span></p>
				<p>PHONE : <label>+7 707 758 41 82</label></p>
				<p>Instagram: <a href="almatypovar_banket">info@example.com</a></p>
				<ul class="social-in">
				
					<li><a href="https://wa.me/87077584182/text=Здравствуйте!%20Я%20хочу%20записаться%20на%20проведение%20банкета!"><i> </i></a></li>					
					<li><a href="https://www.instagram.com/almatypovar_banket/"><i class="instagram"> </i></a></li>

				</ul>

				</div>
				<div class="col-md-3 amet-sed-box ">
					<ul class="nav-bottom">
						<li><a href="about.php" >О НАС</a> </li>
						<li><a href="404.php" >ЗАКАЗАТЬ</a></li>
						<li><a href="gallery.php">МЕНЮ </a></li>
						
						<li><a href="contact.php">КОНТАКТЫ </a></li>						
					</ul>
				</div>
				<div class="col-md-5 amet-sed-top ">	
						<div class="enter">
						<form>
							<input type="text" value="Оставьте ваши контаты что б мы свзались с вами" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >	
							<input type="submit" value="">
						</form>	
						</div>
<p>Для ответа на ваши вопросы, предложения, претензии вы можете оставить свои контактные данные для того что б наши операторы смогли с вами связаться
<span>Нам важен каждый клиент!</span></p>						
				</div>
				<div class="clearfix"> </div>
		 <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>

</body>
</html>