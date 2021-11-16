<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Diary4U | Checkout </title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- <script src="js/customDiary.js"></script>-->
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
                <li>Customize Your Diary</li>
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
                <h3>Customize Your Diary<span> Here</span></h3>


                <div class="w3_login_module">
                    <div class="module formreg-module">

                        <div class="form">


                            <form action="#" method="GET" name = "diaryForm">
                                <?php

                                $PaperColor = isset($_GET['paperClr']) ? $_GET['paperClr'] : "";
                                $PaperType = isset($_GET['paperType']) ? $_GET['paperType'] : "";
                                $Theme = isset($_GET['theme']) ? $_GET['theme'] : "";
                                $diarySize = isset($_GET['size']) ? $_GET['size'] : "";
                                $customText = isset($_GET['txtCustomText']) ? $_GET['txtCustomText'] : "";
                                $quantity = isset($_GET['txtQuantity']) ? $_GET['txtQuantity'] : "";
                                ?>

                                <table style="width:100%;">

                                    <tr>
                                        <td style="padding: 5px"> <label for="paperClr">Paper Colour</label></td>
                                        <td style="padding: 5px">
                                            <select id="paperClr" name="paperClr" required>
                                                <option value="">Select</option>
                                                <option value="White" <?php if ($PaperColor == "White") echo "selected"; ?>>White</option>
                                                <option value="Yellow" <?php if ($PaperColor == "Yellow") echo "selected"; ?>>Yellow</option>
                                                <option value="Green" <?php if ($PaperColor == "Green") echo "selected"; ?>>Green</option>
                                                <option value="Pattern" <?php if ($PaperColor == "Pattern") echo "selected"; ?>>Pattern</option>
                                                <option value="Purple" <?php if ($PaperColor == "Purple") echo "selected"; ?>>Purple</option>
                                                <option value="Rose" <?php if ($PaperColor == "Rose") echo "selected"; ?>>Rose</option>
                                                <option value="Seablue" <?php if ($PaperColor == "Seablue") echo "selected"; ?>>Seablue</option>



                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px"> <label for="paperType">Paper Type</label></td>
                                        <td style="padding: 5px">
                                            <select id="paperType" name="paperType" required>
                                                <option value="">Select</option>
                                                <option value="Plain" <?php if ($PaperType == "Plain") echo "selected"; ?>>Plain</option>
                                                <option value="Lined" <?php if ($PaperType == "Lined") echo "selected"; ?>>Lined</option>
                                                <option value="Dotted" <?php if ($PaperType == "Dotted") echo "selected"; ?>>Dotted</option>

                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="padding: 5px"> <label for="theme">Paper Theme</label></td>
                                        <td style="padding: 5px">
                                            <select id="theme" name="theme" required>
                                                <option value="">Select</option>
                                                <option value="Bloosam" <?php if ($Theme == "Bloosam") echo "selected"; ?>>Bloosam</option>
                                                <option value="Autumn" <?php if ($Theme == "Autumn") echo "selected"; ?>>Autumn</option>
                                                <option value="Summer" <?php if ($Theme == "Bloosam") echo "selected"; ?>>Summer</option>
                                                <option value="Butterfly" <?php if ($Theme == "Summer") echo "selected"; ?>>Butterfly</option>
                                                <option value="Cheetah" <?php if ($Theme == "Cheetah") echo "selected"; ?>>Cheetah</option>
                                                <option value="Greeny" <?php if ($Theme == "Greeny") echo "selected"; ?>>Greeny</option>
                                                <option value="Blue&White" <?php if ($Theme == "Blue&White") echo "selected"; ?>>Blue&White</option>
                                                <option value="Silence" <?php if ($Theme == "Silence") echo "selected"; ?>>Silence</option>


                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px"> <label for="Diary Size">Diary Size</label></td>
                                        <td style="padding: 5px">
                                            <select id="size" name="size" required>
                                                <option value="">Select</option>
                                                <option value="A4" <?php if ($diarySize == "A4") echo "selected"; ?>>A4 210mm x 297mm.</option>
                                                <option value="A5" <?php if ($diarySize == "A5") echo "selected"; ?>>A5 – 148mm x 210mm.</option>
                                                <option value="Personal" <?php if ($diarySize == "Personal") echo "selected"; ?>>Personal – 95mm x 171mm.</option>
                                                <option value="Pocket" <?php if ($diarySize == "Pocket") echo "selected"; ?>>Pocket – 81mm x 120mm</option>
                                                <option value="Mini" <?php if ($diarySize == "Mini") echo "selected"; ?>> Mini – 67mm x 105mm</option>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 5px"> <label for="txtQuantity">Units</label></td>
                                        <td style="padding: 5px">
                                            <input type="text" name="txtQuantity" id="txtQuantity" placeholder="Quantity" required=" " value=<?php echo $quantity; ?>>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td style="padding: 5px"> <label for="txtCustomText">Add Custom Text</label></td>
                                        <td style="padding: 5px">
                                            <input type="text" name="txtCustomText" id="txtCustomText" placeholder="Custom Text" required=" " value=<?php echo $customText; ?>>
                                        </td>

                                    </tr>


                                    <tr style="padding-top: 25px">
                                        <td colspan="3" style="padding: 5px">
                                            <input type="submit" name="addToCart" value="ADD TO CART " style="padding-left: 10px;  background: green;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                                            <input type="submit" name="Preview" value="PREVIEW " style="background: blue;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                                            <input type="button" name="cancel"  value="RESET" onClick="clearDiaryFields()" style="background: red;color: #ffffff;padding: 10px 15px;font-size: 14px;font-weight: bold;">
                                            
                                        </td>

                                    </tr>
                                </table>

                                <div id="previewCustomDiary">

                                    <?php
                                    if (isset($_GET['Preview'])) {

                                        echo '
                                <div class="container">
                                </br>
                                    <h2 align="left" > Preview of your customized Diary </h2>
                                    <div class="agileits_team_grids">';

                                        if ($Theme == 'Bloosam') {
                                            $Price= 15.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Bloosam.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme: Bloosam</h4>
                                               <h5> Price: 15.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Autumn') {
                                            $Price= 25.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Autumn.jpeg" alt=" " class="img-responsive" />
                                               <h4> Theme : Autumn </h4>
                                               <h5> Price: 25.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Summer') {
                                            $Price= 20.00;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Empower.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme: Summer</h4>
                                               <h5> Price: 20.00 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Cheetah') {
                                            $Price= 35.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Cheetah.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme: Cheetah</h4>
                                               <h5> Price: 35.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Butterfly') {
                                            $Price= 19.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Butterfly1.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme : Butterfly </h4>
                                               <h5> Price: 19.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Greeny') {
                                            $Price= 29.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Greeny.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme: Greeny</h4>
                                               <h5> Price:29.99 AUD</h5>

                                           </div>';
                                        }
                                        if ($Theme == 'Blue&White') {
                                            $Price= 15.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Blue&White.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme : Blue&White </h4>
                                               <h5> Price: 15.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($Theme == 'Silence') {
                                            $Price= 24.99;
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Silence.jpg" alt=" " class="img-responsive" />
                                               <h4> Theme: Silence</h4>
                                               <h5> Price:  24.99 AUD</h5>
                                           </div>';
                                        }
                                        if ($PaperType == 'Plain') {
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/plainDiary.jpg" alt=" " class="img-responsive" />
                                               <h4> Paper Type : Plain </h4>
                                           </div>';
                                        }
                                        if ($PaperType == 'Dotted') {
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Dotted.jpg" alt=" " class="img-responsive" />
                                               <h4> Paper Type : Dotted </h4>
                                           </div>';
                                        }
                                        if ($PaperType == 'Lined') {
                                            echo ' <div class="col-md-3 agileits_team_grid">
                                               <img src="diaryImages/Lined.jpg" alt=" " class="img-responsive" />
                                               <h4> Paper Type : Lined </h4>
                                           </div>';
                                        }
                                        if ($PaperColor == 'Yellow') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/yellow.png" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : Yellow </h4>
                                            </div>';
                                        }
                                        if ($PaperColor == 'White') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/white2.png" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : off white </h4>
                                            </div>';
                                        }

                                        if ($PaperColor == 'Green') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/Green.jpg" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : Green </h4>
                                            </div>';
                                        }
                                        if ($PaperColor == 'PolkaDot') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/PolkaDot.jpg" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : PolkaDot </h4>
                                            </div>';
                                        }


                                        if ($PaperColor == 'Rose') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/Rose.jpg" alt=" " class="img-responsive" />
                                                <h4> Paper Colour </h4>
                                            </div>';
                                        }
                                        if ($PaperColor == 'Purple') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/Purple.jpg" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : Purple </h4>
                                            </div>';
                                        }
                                        if ($PaperColor == 'Seablue') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/SeaBlue.jpg" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : Seablue  </h4>
                                            </div>';
                                        }
                                        if ($PaperColor == 'Pattern') {
                                            echo '<div class="col-md-3 agileits_team_grid">
                                                <img src="diaryImages/Seamless.png" alt=" " class="img-responsive" />
                                                <h4> Paper Colour : Pattern</h4>
                                            </div>';
                                        }
                                    }
                                    ?>

                                </div>

                                <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>


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
    <script type="text/javascript">
  function clearDiaryFields()
  {
    //document.getElementById("diaryForm").reset();
    window.location = "customizeDiary.php"
  }
</script>
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

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };


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

    if (isset($_GET['addToCart'])) {
        $PaperColor = isset($_GET['paperClr']) ? $_GET['paperClr'] : "";
        $PaperType = isset($_GET['paperType']) ? $_GET['paperType'] : "";
        $Theme = isset($_GET['theme']) ? $_GET['theme'] : "";
        $TextCover = isset($_GET['txtCustomText']) ? $_GET['txtCustomText'] : "";
        $Size = isset($_GET['size']) ? $_GET['size'] : "";
        $LoginID = $_SESSION['userID'];
        $Quantity = isset($_GET['txtQuantity']) ? $_GET['txtQuantity'] : "";
        if ($Theme == 'Bloosam') 
            $Price= 15.99;
        if ($Theme == 'Autumn') 
                $Price= 25.99;
        if ($Theme == 'Summer') 
                $Price= 20.00;
        if ($Theme == 'Cheetah') 
                $Price= 35.99;
        if ($Theme == 'Butterfly') 
                $Price= 19.99;
        if ($Theme == 'Greeny') 
                $Price= 29.99;
        if ($Theme == 'Blue&White') 
               $Price= 15.99;
        if ($Theme == 'Silence') 
                $Price= 24.99;
        

                $totalPrice =  $Quantity *  $Price;

         echo $PaperColor." ".$PaperType." ".$Theme." ".$TextCover." ".$Price." ".$LoginID;

        $fieldNamesCustomization = "PaperColor,Theme,PaperType,TextCover,Size,Price,Quantity,Totalprice,LoginID"; // DB Field Names
        $columnValuesCustomization = "'$PaperColor','$Theme','$PaperType','$TextCover','$Size',$Price,$Quantity,$totalPrice,$LoginID";
        $connObj->dbInsert('tbl_customization', $fieldNamesCustomization, $columnValuesCustomization);

        echo '<script type="text/javascript">
        alert("Item Successfully added to the cart");
        window.location = "addToCart.php"
        </script>';
    }
    ?>
</body>

</html>