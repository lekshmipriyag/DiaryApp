<?php

require_once('DBConnection.php');
$connObj = new DBConnection();
session_start();

if (isset($_POST['submit_pay'])) {
	if (isset($_SESSION['userID'])) {
		$expiry = str_replace(' ', '', $_POST['expiration-month-and-year']);
		$cvv = $_POST['security-code'];
		$number = str_replace(' ', '', $_POST['number']);
		$txn = uniqid();
		$query = "INSERT INTO `tbl_paymentdetails` (`TransactionNumber`,`PaymentType`,`CardNo`,`ExpDate`,`Name`,`CCV`,`CustomerID`) VALUES ('" . $txn . "','credit','$number',' $expiry','$_POST[name]','$cvv','$_SESSION[userID]')";
		mysqli_query($connObj->connection, $query);
		$paymentid = mysqli_insert_id($connObj->connection);

		$status = "completed";
		$ordernumber = $_SESSION['orderNumber'];
		$grandTotal =   $_SESSION['grandTotal'];
		$quantity =   $_SESSION['totalquantity'];

		$query = "INSERT INTO `tbl_orderdetails` (`OrderNumber`,`quantity`,`CustomerID`,`PaymentID`,`OrderDate`,`GrandTotal`,`status`) VALUES ('$ordernumber','$quantity','$_SESSION[userID]','$paymentid',now(),$grandTotal,'$status')";
		mysqli_query($connObj->connection, $query);
		$orderID = mysqli_insert_id($connObj->connection);
		$_SESSION['orderID'] = $orderID;
		header("Location: payment.php?res=" . md5(2) . "&orderNum=" . $ordernumber . "&txn=" . $txn);
	} else {
		header("Location: payment.php?err=" . md5(1));
	}
}

if (isset($_POST['submit_paypal'])) {
	if (isset($_SESSION['userID'])) {
		$expiry = str_replace(' ', '', $_POST['expiration-month-and-year']);
		$cvv = $_POST['security-code'];
		$number = str_replace(' ', '', $_POST['number']);
		$txn = uniqid();
		$query = "INSERT INTO `tbl_paymentdetails` (`TransactionNumber`,`PaymentType`,`CardNo`,`ExpDate`,`Name`,`CCV`,`CustomerID`) VALUES ('" . $txn . "','paypal','$number',' $expiry','$_POST[name]','$cvv','$_SESSION[userID]')";
		mysqli_query($connObj->connection, $query);
		$paymentid = mysqli_insert_id($connObj->connection);

		$status = "completed";
		$ordernumber = $_SESSION['orderNumber'];
		$grandTotal =   $_SESSION['grandTotal'];
		$quantity =   $_SESSION['totalquantity'];

		$query = "INSERT INTO `tbl_orderdetails` (`OrderNumber`,`quantity`,`CustomerID`,`PaymentID`,`OrderDate`,`GrandTotal`,`status`) VALUES ('$ordernumber','$quantity','$_SESSION[userID]','$paymentid',now(),$grandTotal,'$status')";
		mysqli_query($connObj->connection, $query);
		$orderID = mysqli_insert_id($connObj->connection);
		$_SESSION['orderID'] = $orderID;
		header("Location: payment.php?res=" . md5(2) . "&orderNum=" . $ordernumber . "&txn=" . $txn);
	} else {
		header("Location: payment.php?err=" . md5(1));
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="shift_jis">
	<title> Diary4U | Payment </title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">


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

	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header -->
	<?php require_once('header.php'); ?>

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
				<li>Payment</li>
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
			<!-- payment -->
			<div class="privacy about">
				<h3>Pay<span>ment</span></h3>
				<?php
				if (isset($_GET['res'])) {
					if ($_GET['res'] == md5(2)) {
						// echo"  <h4> Your payment has been successful. The order number is ".$_GET['orderNum']." & payment transaction id is ".$_GET['txn']."</h4>"; 
				?>
				<script>
							alert("order Placed successfully");
							window.location = "customizeDiary.php"
						</script>
						<?php
						$LoginID = $_SESSION['userID'];
						$cond = "LoginID='$LoginID'";
						$connObj->dbDelete('tbl_customization', $cond );
					 }
				}

				if (isset($_GET['err'])) {
					if ($_GET['err'] == md5(1)) { ?>

						<script>
							alert("Please login first to proceed for payment");
						</script>

				<?php }
				}
				?>
				<div class="checkout-right">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">

							<li>Credit/Debit</li>
							<li>Paypal Account</li>
						</ul>
						<div class="resp-tabs-container hor_1">


							<div>
								<form method="post" class="creditly-card-form agileinfo_form" id="creditly-card" autocomplete="off">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="credit-card-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Name on Card</label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith" required=" ">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Card Number</label>
															<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">CVV</label>
															<input class="security-code form-control" inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Expiration Date</label>
													<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY" required>
												</div>
											</div>
											<button class="submit" type="submit" name="submit_pay" ><span>Make a payment </span></button>
										</div>
									</section>
								</form>
							</div>

							<div>
								<div id="tab4" class="tab-grid" style="display: block;">
									<div class="row">
										<div class="col-md-6">
											<img class="pp-img" src="images/paypal.png" alt="Image Alternative text" title="Image Title">
											<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p><a class="btn btn-primary">Checkout via Paypal</a>
										</div>
										<div class="col-md-6">
											<form method="post" class="creditly-card-form agileinfo_form" id="paypal" autocomplete="off">
												<section class="creditly-wrapper wthree, w3_agileits_wrapper">
													<div class="credit-card-wrapper">
														<div class="first-row form-group">
															<div class="controls">
																<label class="control-label">Name on Card</label>
																<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith" required=" ">
															</div>
															<div class="w3_agileits_card_number_grids">
																<div class="w3_agileits_card_number_grid_left">
																	<div class="controls">
																		
																		<label class="control-label">Card Number</label>
																		<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required>
																	</div>
																</div>
																<div class="w3_agileits_card_number_grid_right">
																	<div class="controls">
																		<label class="control-label">CVV</label>
																		<input class="security-code form-control" inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;" required>
																	</div>
																</div>
																<div class="clear"> </div>
															</div>
															<div class="controls">
																<label class="control-label">Expiration Date</label>
																<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY" required>
															</div>
														</div>
														<button class="submit" type="submit" name="submit_paypal"><span>Make a payment </span></button>
													</div>
												</section>
											</form>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>

					<!--Plug-in Initialisation-->

					<!-- // Pay -->

				</div>

			</div>
			<!-- //payment -->
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //banner -->


	<!-- newsletter -->

	<!-- //newsletter -->
	<!-- footer -->
	<?php require_once('footer.php'); ?>
	<!-- //footer -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- easy-responsive-tabs -->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>
	<!-- //easy-responsive-tabs -->
	<script type="text/javascript">
		$(document).ready(function() {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function(event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- credit-card -->
	<script type="text/javascript" src="js/creditly.js"></script>
	<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

	<script type="text/javascript">
		$(function() {
			var creditly = Creditly.initialize(
				'.creditly-wrapper .expiration-month-and-year',
				'.creditly-wrapper .credit-card-number',
				'.creditly-wrapper .security-code',
				'.creditly-wrapper .card-type');

			$('#creditly-card').submit(function(e) {

				var output = creditly.validate();
				if (output) {
					$("#creditly-card").submit();
					console.log(output);
				} else {
					e.preventDefault();
				}
			});

		});
	</script>
	<!-- //credit-card -->

	<!-- //js -->
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

</body>

</html>