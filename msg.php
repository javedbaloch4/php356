<?php
require_once 'models/User.php';
require_once 'models/Brand.php';
require_once 'models/Cart.php';
require_once 'views/header.php';
//require_once 'views/header_banner.php';
//require_once 'views/slider.php';
require_once 'views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<?php
if(isset($_SESSION['msg'])){

    $msg = $_SESSION['msg'];
    echo("<h2>$msg</h2>");
    unset($_SESSION['msg']);
}
if(isset($_SESSION['msg_acc'])){

    $msg_acc = $_SESSION['msg_acc'];
    echo("<h2>$msg_acc</h2>");
    unset($_SESSION['msg_acc']);
}


?>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
    
<?php
require_once 'views/footer.php';
