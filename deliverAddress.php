<?php
session_start();
require_once('DBConnection.php');
$connObj = new DBConnection();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Diary4U | Add To Cart </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <li>Checkout</li>
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
            <!-- shopping cart details -->
            <div class="privacy about">
                <h3>Select a <span>delivery address</span></h3>
                <?php
                //getting order ID

                $orderID = "";

                if (isset($_SESSION['orderID'])) {
                    $orderID = $_SESSION['orderID'];
                }

                ?>
                <div class="checkout-left">

                    <div class="col-md-8 checkout-left-basket">

                        <div id="addressForDelivery">
                            <form action="" method="post" class="creditly-card-form agileinfo_form">
                                <div class="controls">
                                    <label class="control-label">Deliver Options: </label>

                                    <select id="txtdeliverOPt" style="width: 100%;padding: 1em 1em 1em 1em;font-size: 0.8em; margin: 0.5em 0; outline: none;
                                                                                color: #212121;
                                                                                border: none;
                                                                                border: 1px solid #ccc;
                                                                                letter-spacing: 1px;
                                                                                text-align: left;" name="txtdeliverOPt" required>
                                        <option value="">Select</option>
                                        <option value="standard">Standard</option>
                                        <option value="express">Express</option>
                                    </select>
                                </div>
                                <?php
                                $LoginID = $_SESSION['userID'];
                                $cond = "Userid='$LoginID'";
                                $name = $mobileNo = $address = $state =  $postCode = "";
                                $res = $connObj->dbSelectID('tbl_register', $cond);
                                if (mysqli_num_rows($res) > 0) {
                                    $row = mysqli_fetch_assoc($res);
                                    $name = $row['Name'];
                                    $mobileNo = $row['MobileNo'];
                                    $address = $row['Address'];
                                    $state = $row['State'];
                                    $postCode = $row['PostCode'];
                                }

                                ?>
                                <label class="control-label"><?php echo $name; ?> </label> <br>
                                <label class="control-label"><?php echo $address; ?> </label> <br>
                                <label class="control-label"><?php echo $postCode; ?> </label> <br>
                                <label class="control-label"><?php echo $state; ?> </label> <br>
                                <label class="control-label"><?php echo $mobileNo; ?> </label> <br>

                                <br>

                                <div>
                                    <input type="submit" name="submit" value="DELIVER TO ABOVE ADDRESS" style="background: green;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">

                                    <input type="button" name="edit" value="EDIT" id="editDeliverAddress" style="background: blue;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                                </div>
                            </form>
                        </div>


                        <div id="editAddress">
                            <form action="" method="post" class="creditly-card-form agileinfo_form">
                                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">

                                            <div class="controls">
                                                <label class="control-label">Deliver Options: </label>

                                                <select id="txtdeliverOPt" style="width: 100%;padding: 1em 1em 1em 1em;font-size: 0.8em; margin: 0.5em 0; outline: none;
                                                                                color: #212121;
                                                                                border: none;
                                                                                border: 1px solid #ccc;
                                                                                letter-spacing: 1px;
                                                                                text-align: left;" name="txtdeliverOPt" required>
                                                    <option value="">Select</option>
                                                    <option value="standard">Standard</option>
                                                    <option value="express">Express</option>
                                                </select>
                                            </div>

                                            <div class="controls">
                                                <label class="control-label">Name: </label>
                                                <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name" value="<?php echo $name; ?>" required>
                                            </div>

                                            <div class="controls">
                                                <label class="control-label">Address: </label>
                                            </div>
                                            <div class="controls">
                                                <textarea id="txtAddress" class="form-control" rows="4" cols="50" name="txtAddress" required> <?php echo $address; ?>
                                              </textarea>
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Post code: </label>
                                                <input class="form-control" type="text" placeholder="Post code" value="<?php echo $postCode; ?>" name="txtPostCode" required="Enter postcode" pattern="[0-9]{4}" title="enter a 4 digit pin code">
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">State: </label>

                                                <select id="txtState" style="width: 100%;padding: 1em 1em 1em 1em;font-size: 0.8em; margin: 0.5em 0; outline: none;
                                                                                color: #212121;
                                                                                border: none;
                                                                                border: 1px solid #ccc;
                                                                                letter-spacing: 1px;
                                                                                text-align: left;" name="txtState" required>
                                                    <option value="">Select</option>
                                                    <option value="NewSouthWales" <?php if ($state == "NewSouthWales") echo "selected"; ?>>NewSouthWales</option>
                                                    <option value="Queensland" <?php if ($state == "Queensland") echo "selected"; ?>>Queensland</option>
                                                    <option value="SouthAustralia" <?php if ($state == "SouthAustralia") echo "selected"; ?>>SouthAustralia</option>
                                                    <option value="Tasmania" <?php if ($state == "Tasmania") echo "selected"; ?>>Tasmania</option>
                                                    <option value="Victoria" <?php if ($state == "Victoria") echo "selected"; ?>>Victoria</option>
                                                    <option value="WesternAustralia" <?php if ($state == "WesternAustralia") echo "selected"; ?>>WesternAustralia</option>

                                                </select>
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Mobile number:</label>
                                                        <input class="form-control" type="text" placeholder="Mobile number" name="mobileNum" value="<?php echo $mobileNo; ?>" required="" pattern="[0-9]{10}" title="Invalid Phone Number">
                                                    </div>
                                                </div>

                                                <div class="clear"> </div>
                                            </div>
                                            <input type="submit" name="EditData" value="DELIVER TO THIS ADDRESS" style="background: green;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                                            <input type="button" name="edit" value="RETURN TO ADDRESS BOOK" id="returnToMainAddress" style="background: black;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">

                                        </div>

                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                </div>

            </div>
            <!-- //about -->
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- //Code to remove an Item from cart -->
    <!-- //banner -->

    <!-- newsletter -->

    <!-- //newsletter -->
    <!-- footer -->
    <?php require_once('footer.php'); ?>
    <!-- //footer -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!--quantity-->
    <script>
        $('.value-plus').on('click', function() {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            divUpd.text(newVal);
        });

        $('.value-minus').on('click', function() {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
        });
    </script>
    <!--quantity-->
    <script>
        $(document).ready(function(c) {
            $('.close1').on('click', function(c) {
                $('.rem1').fadeOut('slow', function(c) {
                    $('.rem1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close2').on('click', function(c) {
                $('.rem2').fadeOut('slow', function(c) {
                    $('.rem2').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close3').on('click', function(c) {
                $('.rem3').fadeOut('slow', function(c) {
                    $('.rem3').remove();
                });
            });
        });
    </script>

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
    <script src="js/addToCart.js" type="text/javascript"></script>
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

    <!-- //here ends scrolling icon -->
    <script src="js/minicart.js"></script>


    <?php

    if (isset($_POST['submit'])) {

        $deliverOpt = isset($_POST['txtdeliverOPt']) ? $_POST['txtdeliverOPt'] : "";

        $fieldNamesDelivery = "DeliveryType,Name,MobileNo,Address,Country,State,PostCode,CustomerID,OrderID"; // DB Field Names
        $columnValuesDelivery = "'$deliverOpt','$name','$mobileNo','$address','Australia','$state','$postCode','$LoginID','$orderID'";
        $connObj->dbInsert('tbl_deliverydetails', $fieldNamesDelivery, $columnValuesDelivery);
        updateOrderStatus($connObj, $orderID);
        echo '<script type="text/javascript">
        alert("Order Placed successfully");
        window.location = "login.php"
        </script>';
    }

    if (isset($_POST['EditData'])) {
        $deliverOpt = isset($_POST['txtdeliverOPt']) ? $_POST['txtdeliverOPt'] : "";
        $name =  isset($_POST['name']) ? $_POST['name'] : "";
        $mobileNo = isset($_POST['mobileNum']) ? $_POST['mobileNum'] : "";
        $address = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : "";
        $state = isset($_POST['txtState']) ? $_POST['txtState'] : "";
        $postCode = isset($_POST['txtPostCode']) ? $_POST['txtPostCode'] : "";

        $fieldNamesDelivery = "DeliveryType,Name,MobileNo,Address,Country,State,PostCode,CustomerID,OrderID"; // DB Field Names
        $columnValuesDelivery = "'$deliverOpt','$name','$mobileNo','$address','Australia','$state','$postCode','$LoginID','$orderID'";
        $connObj->dbInsert('tbl_deliverydetails', $fieldNamesDelivery, $columnValuesDelivery);
        updateOrderStatus($connObj, $orderID);
        echo '<script type="text/javascript">
        alert("Order Placed successfully");
        window.location = "login.php"
        </script>';
    }


    function updateOrderStatus($connObj, $orderID)
    {
        $fieldName = "status='completed'";
        $cond1 = "orderId='$orderID'";
        $connObj->dbUpdate('tbl_orderdetails', $fieldName, $cond1);
    }


    ?>
</body>

</html>