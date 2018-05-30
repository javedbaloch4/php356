<?php
require_once '../models/User.php';
require_once '../models/Porduct.php';
require_once '../views/header.php';
require_once '../views/header_banner.php';
require_once '../views/slider.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<?php
$obj_product = new Product();

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
$obj_product->get_product($product_id);
?>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
    
<?php
require_once '../views/footer.php';
