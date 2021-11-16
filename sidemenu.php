<ul class="nav navbar-nav nav_1">
	<li><a href="index.php">HOME</a></li>
	<li><a href="about.php">ABOUT US</a></li>
	<li><a href="products.php">OUR PRODUCTS</a></li>
	<li class="dropdown mega-dropdown active">
	</li>
	<?php if (isset($_SESSION['username'])) { ?>
		<li><a href="customizeDiary.php">CUSTOMIZE YOUR DIARY</a></li>

	<?php } else { ?>
		<li><a href="login.php">CUSTOMIZE YOUR DIARY</a></li>

	<?php } ?>
	<?php if (isset($_SESSION['username'])) { ?>
		<li><a href="addToCart.php">MY CART</a></li>

	<?php } else { ?>
		<li><a href="login.php">MY CART</a></li>

	<?php } ?>
	<?php if (isset($_SESSION['username'])) { ?>
		<li><a href="orderHistory.php">PURCHASE HISTORY</a></li>

	<?php } else { ?>
		<li><a href="login.php">PURCHASE HISTORY</a></li>
	<?php } ?>
	<?php if (isset($_SESSION['username'])) { ?>
		<li><a href="feedback.php">FEEDBACK</a></li>

	<?php } else { ?>
		<li><a href="login.php">FEEDBACK</a></li>
	<?php } ?>
	<?php if (isset($_SESSION['username'])) { ?>
		<li><a href="changePassword.php">CHANGE PASSWORD</a></li>

	<?php } else { ?>
		<li><a href="login.php">CHANGE PASSWORD</a></li>
	<?php } ?>
	<li><a href="">CONTACT US</a></li>
</ul>