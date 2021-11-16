<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title> Diary4U | Feedback </title>
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
                <li>Sign In</li>
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
                    <ul class="nav navbar-nav nav_1">
                        <?php require_once('sidemenu.php'); ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="w3l_banner_nav_right">
            <div class="w3_login">
                <h3>Write a feedback </h3>


                <div class="w3_login_module">
                    <div class="module formreg-module">

                        <div class="form">


                            <form action="#" method="post">


                                <table style="width:100%;">

                                    <tr>
                                        <td style="padding: 5px"> <label for="txtViewFeedback">Who can view my feedback</label></td>
                                        <td style="padding: 5px">

                                            <select id="txtViewFeedback" name="txtViewFeedback" required>
                                                <option value="">Select</option>
                                                <option value="everyone">Everyone</option>
                                                <option value="admin">Admin Only</option>

                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="padding: 5px"> <label for="txtAddress">Please leave your feedback here</label></td>
                                        <td style="padding: 5px"><textarea id="txtAddress" rows="4" cols="50" name="txtAddress" required></textarea></td>

                                    </tr>


                                    <tr>
                                        <td>

                                            <input type="submit" name="send" value="SEND " style="padding-left: 10px;  background: green;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">

                                        <td></td>

                                        </td>
                                    </tr>
                                </table>

                            </form>
                            <form method="POST">
                                <input type="submit" id="otherFeedbacks" name="otherFeedbacks" value="VIEW REVIEWS " style="background: blue;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                            </form>

                            <?php
                            require_once('DBConnection.php');
                            $connObj = new DBConnection();

                            if (isset($_POST['otherFeedbacks'])) {

                                $cond = "ViewFeedback='everyone'";
                                echo ' <br> </br>
                        <h2 align="Left" style="color:Red;">Reviews By Customers</h2>
                        <br> </br>';

                                if ($result = $connObj->dbSelectId('tbl_feedback', $cond)) {
                                    while ($row = $result->fetch_assoc()) {
                                        $field1name = $row["Feedback"];
                                        $field2name = $row["ViewFeedback"];
                                        $field3name = $row["Feedback_date"];
                                        $field4name = $row["CustmerID"];
                                        $cond1 = "Userid =$field4name";
                                        if ($result1 = $connObj->dbSelectValue('Name', 'tbl_register', $cond1)) {
                                            while ($row = $result1->fetch_assoc()) {
                                                $Username = $row["Name"];
                                            }
                                        }
                                        echo  ' <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                               
                                                <label class="control-label">';
                                        echo  $Username . " On " . $field3name;
                                        echo  ' </label>
                                         </div>
                                         <div class="controls">
                                                <textarea id="txtAddress" rows="3" cols="50" name="txtAddress" readonly>';

                                        echo $field1name;
                                        echo '</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </section>';
                                    }
                                }
                            }


                            ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script>
            $('.toggle').click(function() {
                // Switches the Icon
                $(this).children('i').toggleClass('fa-pencil');
                // Switches the forms  
                $('.form').animate({
                    height: "toggle",
                    'padding-top': 'toggle',
                    'padding-bottom': 'toggle',
                    opacity: "toggle"
                }, "slow");
            });
        </script>
    </div>
    <!-- //login -->
    </div>
    <div class="clearfix"></div>
    </div>
    <!-- //banner -->
    <!-- newsletter-top-serv-btm -->

    <!-- //newsletter-top-serv-btm -->
    <!-- newsletter -->

    <!-- //newsletter -->
    <!-- footer -->
    <?php require_once('footer.php'); ?>
    <!-- //footer -->
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
    <?php

    require_once('DBConnection.php');
    $connObj = new DBConnection();

    if (isset($_POST['send'])) {
        $viewFeedback = isset($_POST['txtViewFeedback']) ? $_POST['txtViewFeedback'] : "";
        $date = date("Y/m/d");
        $feedbackText = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : "";
        $customerId = $_SESSION['userID'];

        echo $customerId . " " . $viewFeedback . " " . $date . " " . $feedbackText;


        $fieldNamesFeedback = "Feedback,ViewFeedback,Feedback_date,CustmerID"; // DB Field Names
        $columnValuesFeedback = "'$feedbackText','$viewFeedback','$date',$customerId";
        $connObj->dbInsert('tbl_feedback', $fieldNamesFeedback, $columnValuesFeedback);

        echo '<script type="text/javascript">
        alert("Your Feedback is Successfully registered");
        window.location = "feedback.php"
        </script>';
    }


    ?>
</body>

</html>