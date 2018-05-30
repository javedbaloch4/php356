<?php
session_start();
define("BASE_HOST", "http://" . $_SERVER['HTTP_HOST'] . "/");
define("BASE_FOLDER", "evs/php356/project/");
define("BASE_URL", BASE_HOST . BASE_FOLDER);
define("ITEM_PER_PAGE", 3);


if(isset($_COOKIE['obj_user'])){
    $_SESSION['obj_user']= $_COOKIE['obj_user'];
}
if(isset($_SESSION['obj_user'])){
    $obj_user = unserialize($_SESSION['obj_user']);
}
else{
    $obj_user = new User();
}

if (isset($_SESSION['obj_cart'])) {
    $obj_cart = unserialize($_SESSION['obj_cart']);
} else {
    $obj_cart = new Cart();
}

$current = $_SERVER['PHP_SELF'];
//echo($current);
$public_pages = array(
    '/' . BASE_FOLDER . 'login.php',
    '/' . BASE_FOLDER . 'signup.php',
    );
$restricted_pages = array(
    '/' . BASE_FOLDER . 'users/my_account.php',
    '/' . BASE_FOLDER . 'products/check_out.php',
    );

if($obj_user->id == 0 && in_array($current, $restricted_pages)){
    $_SESSION['msg_acc'] = "You must Login To View This Page";
    header("Location:" . BASE_URL . "msg.php");
}
if($obj_user->id > 0 && in_array($current, $public_pages)){
    $_SESSION['msg_acc'] = "You must Logout To View This Page";
    header("Location:" . BASE_URL . "msg.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>My Store Demo</title>
<link href="<?php echo(BASE_URL);?>css/bootstrap.css" media="all" type="text/css" rel="stylesheet" >
<link href="<?php echo(BASE_URL);?>css/metallic.css" media="all" type="text/css" rel="stylesheet" >

<link href="<?php echo(BASE_URL);?>css/styles.css" media="all" type="text/css" rel="stylesheet" />
<!--[if IE]>
<style type="text/css"> 
#header-banner-text-heading, .footer-menu { zoom: 1;}
</style>
<![endif]-->

<!--

When anonymous line boxes (boxes that contain inline content) are adjacent to a float, a 3px gap appears between the line box and the edge of the float. This gap disappears when the content clears the float, causing the content to "jog" three pixels in the direction of the float. Note that the gap may be difficult to see when left-aligned text is adjacent to a right float, but it does exist and it can lead to "float drop" in tight layouts.

Affects: Internet Explorer 5.0, 5.5, 6.0
Likelihood: Likely
-->
<script src="<?php echo(BASE_URL);?>js/jquery.js"></script>
<script src="<?php echo(BASE_URL);?>js/zebra_datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".date").Zebra_DatePicker({
        format:'d-m-Y'
    });
});
</script>

</head>

<body>
    <div id="header-bg-container"></div>

    <div id="full-page">

        <header>
            <div id="header">
                <div id="logo" class="full-height"><a href=""></a></div>
                <div id="user-data" class="full-height">
                    <div>Welcome </div>
                    <div>You have <?php echo($obj_cart->count);?> items in your cart. Total $<?php echo($obj_cart->total);?></div>
                </div>
                <div id="top-header-right" class="full-height">
                    <div id="top-header-right-top">
<?php
if($obj_user->id > 0){
?>
<a href="<?php echo(BASE_URL);?>process/logout.php">Logout</a>
<?php
}
else{
?>
<a href="<?php echo(BASE_URL);?>login.php">Login</a> | <a href="<?php echo(BASE_URL);?>signup.php">Signup</a>
<?php
}
?>
                    </div>
                    <div id="search-box">
                        <form action="#" method="get">
                            <input id="keyword" class="txt_field" type="text" onblur="clearText(this)" onfocus="clearText(this)" title="keyword" name="keyword" value="Search" />
                            <input id="searchbutton" class="sub-btn" type="submit" title="Search" value="" name="Search" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="header-menu-container">
                <ul class="header-menu">
                    <li><a href="<?php echo(BASE_URL);?>">Home</a></li>
                    <li><a href='<?php echo(BASE_URL);?>products/products.php'>All Products</a></li>
                    <li><a href='<?php echo(BASE_URL);?>products/products.php?type=new'>New Products</a></li>
                    <li><a href='<?php echo(BASE_URL);?>products/products.php?type=top'>Top Products</a></li>
                    <li><a href="<?php echo(BASE_URL);?>products/shopping_cart.php">Shopping Cart</a></li>
                    <li><a href="<?php echo(BASE_URL);?>products/check_out.php">Check Out</a></li>
                    <li><a href="<?php echo(BASE_URL);?>users/my_account.php">My Account</a></li>
                </ul>
            </div>
        </header>
