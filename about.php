<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Diary4u | About Us</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
</head>

<body>
	<!-- header -->
	<?php require_once('header.php'); ?>
	<!-- script-for sticky-nav -->
	<script>
		$(document).ready(function() {
			var navoffeset = $(".agileits_header").offset().top;
			$(window).scroll(function() {
				var scrollpos = $(window).scrollTop();
				if (scrollpos >= navoffeset) {
					$(".agileits_header").addClass("fixed");
				} else {
					$(".agileits_header").removeClass("fixed");
				}
			});

		});
	</script>
	<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Diary</span> 4 you</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<?php require_once('headmenu.php'); ?>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+61) 431 430 140</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="">diary4u@gmail.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->
	<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>About Us</li>
			</ul>
		</div>
	</div>
	<!-- //products-breadcrumb -->
	<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<?php require_once('sidemenu.php'); ?>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<!-- about -->
			<div class="privacy about">
				<h3>About Us</h3>
				<p class="animi"> We are focusing on production of diaries with customizable design.
					We would like to support online sales of client's products.
					There are some parameters of customization for creating a diary. Parameters such as paper color, theme/color of the cover,
					type of paper (plain, lined, or dotted), customizable text on the cover can be used for making a diary. Moreover, clients can make a purchase
					by using PayPal and credit cards by selecting delivery options (standard and express, only Australia-wide). Apart from this, there
					is an option for viewing purchase history for customers.
				</p>
				<div class="agile_about_grids">
					<div class="col-md-6 agile_about_grid_right">
						<img src="diaryImages/diary6.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-6 agile_about_grid_left">
						<img src="diaryImages/diary5.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //banner -->
	<!-- team -->
	<div class="team">
		<div class="container">
			<h3>Meet Our Amazing Team</h3>
			<div class="agileits_team_grids">
				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/33.jpg" alt=" " class="img-responsive" />
					<h4>Rohan Sanjay Bhoi </h4>
					<p>Product Owner</p>

				</div>

				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/35.jpg" alt=" " class="img-responsive" />
					<h4>Jeni George</h4>
					<p>Scrum Master</p>

				</div>
				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/35.jpg" alt=" " class="img-responsive" />
					<h4>Lekshmi Priya Geetha</h4>
					<p>Team Leader</p>

				</div>
				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/34.jpg" alt=" " class="img-responsive" />
					<h4>Ezhirkumaran Barathan </h4>
					<p>Developer</p>

				</div>
				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/33.jpg" alt=" " class="img-responsive" />
					<h4>Waleed Ali Masmali </h4>
					<p>Developer</p>

				</div>


				<div class="col-md-2 agileits_team_grid">
					<img src="diaryImages/34.jpg" alt=" " class="img-responsive" />
					<h4>Jingbo Yao </h4>
					<p>Tester</p>

				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //team -->
	<!-- testimonials -->

	<!-- //testimonials -->
	<!-- newsletter -->

	<!-- //newsletter -->
	<!-- footer -->
	<?php require_once('footer.php'); ?>

	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".dropdown").hover(
				function() {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function() {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- here stars scrolling icon -->
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

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<script src="js/minicart.js"></script>
	<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function(evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
</body>

</html>