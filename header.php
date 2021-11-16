<div class="agileits_header">
	<div class="w3l_offers">
		<a href="products.php">Today's special Offers !</a>
	</div>
	<div class="w3l_search">
		<form action="#" method="post">
			<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
			<input type="submit" value=" ">
		</form>
	</div>

	<!--<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							<li><a href="login.php">Login</a></li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div> -->

	<?php if (isset($_SESSION['username'])) { ?>
		<div class="w3l_header_right1">
			<h2><a href="logout.php">LOGOUT</a></h2>
		</div>
	<?php } else {?>
		<div class="w3l_header_right1">
		<h2><a href="login.php">LOGIN</a></h2>
	</div>
	<?php } ?>
	
	<div class="clearfix"> </div>
</div>