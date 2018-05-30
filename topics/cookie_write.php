<?php
$expire = time() + (60*60*24*15);

setcookie("php356a");

setcookie("php356b", "aaa");
setcookie("php356c", "sss",$expire);
setcookie("php356d", "sss",$expire, "/");
setcookie("php356e", "sss",$expire, "/evs/php356/project/process");

//setcookie("php356f", "sss",$expire, "/", "www.ProgrammerPlusPlus.com");
//setcookie("php356g", "sss",$expire, "/", "ProgrammerPlusPlus.com");
//setcookie("php356h", "sss",$expire, "/", "ProgrammerPlusPlus.com", TRUE);
?>