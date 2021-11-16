<?php
require_once('DBConnection.php');
$connObj = new DBConnection();
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Diary4U | Purchase History </title>
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <!-- about -->
            <div class="privacy about">
                <h3>Past <span>orders</span></h3>

                <div class="checkout-right">
                    <form method="post" id="orderform">
                        <p>From Date: <input type="text" id="fromdate" class="datepicker" size="10" required data-error="Enter from date" name="fromdate" autocomplete="off" />
                            To Date: <input type="text" class="datepicker" size="10" required data-error="Enter to date" id="todate" name="todate" autocomplete="off" />
                            <input type="submit" name="submit" value="Get Orders" style="background-color: blue;color: white;">
                    </form>
                    </p>




                    <?php
                    //if(isset($_POST['submit'])){

                    $customer = $_SESSION['userID'];
                    if (isset($_POST['submit'])) {
                        $todate = $_REQUEST['todate'];
                        $date2 = date('Y-m-d', strtotime($todate . "+1 days"));

                        $date1 = $_REQUEST['fromdate'];
                        $query = "SELECT a.*,b.Address FROM `tbl_orderdetails` a,`tbl_deliverydetails` b WHERE `OrderDate` BETWEEN '$date1' AND '$date2' and a.CustomerID='$customer' and a.OrderNumber=b.OrderNumber ORDER BY `OrderDate` ASC";
                    } else {
                        $query = "SELECT a.*,b.Address FROM `tbl_orderdetails` a,`tbl_deliverydetails` b WHERE  a.CustomerID='$customer' and a.OrderNumber=b.OrderNumber ORDER BY a.OrderNumber ASC";
                    }

                    $q_book = mysqli_query($connObj->connection, $query);
                    //echo $query;
                    $v_book = $q_book->num_rows;
                    $count = 0;
                    if ($v_book > 0) {

                    ?>
                        <div style="padding-top: 15px;">
                            <table class="timetable_sub">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Order Number</th>
                                        <th>Order Placed Date</th>
                                        <th>No. Of Items</th>
                                        <th>Total Price</th>
                                        <th>Ship To</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($f_book = $q_book->fetch_array()) {
                                        $count++;
                                    ?>



                                        <tr class="rem1">
                                            <td class="invert"><?php echo $count; ?></td>
                                            <td class="invert">#<?php echo $f_book['OrderNumber'] ?></td>
                                            <td class="invert"><?php echo date("d/m/Y", strtotime($f_book['OrderDate'])); ?></td>
                                            <td class="invert"><?php echo $f_book['quantity'] ?></td>
                                            <td class="invert"><?php echo $f_book['GrandTotal'] ?></td>
                                            <td class="invert">
                                                <?php echo $f_book['Address'] ?>
                                            </td>

                                        </tr>

                                <?php }
                                } else {
                                    echo '<script type="text/javascript">
                                    alert("No records found based on the selected dates");
                                    window.location = "orderHistory.php"
                                      </script>';
                                }

                                //}
                                ?>
                                </tbody>
                            </table>
                        </div>

                </div>


            </div>
            <!-- //about -->
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--quantity-->
    <script>
        $(function() {
            $(".datepicker").datepicker();

            $(".datepicker").datepicker("option", "dateFormat", "yy-mm-dd");

            //  $("#orderform").submit(function(){
            var error = 0;
            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(e.target.getAttribute("data-error"));
                        error = 1;
                    }

                };
            }
            if (error == 1)
                $("#orderform").submit();
            //});

        });


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

</body>

</html>