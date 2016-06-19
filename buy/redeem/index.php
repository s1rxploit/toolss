<?php 
session_start();
include("../../config.php");
$email = $_SESSION['email'];
if(empty($email)){
header('location: /account'); 
}
$gc = trim($_POST['redeem']);
if(empty($gc)){
header('location: /buy/?msgc=Upss!!! Reedem Code Is Empty!!!!!'); 
}
$cekgc = mysql_query('SELECT * FROM `giftcode` WHERE num = "'.mysql_real_escape_string($gc).'"');
 while($row = mysql_fetch_assoc($cekgc)){
                        $author = $row['author'];                    
                        $reg = $row['registered'];                    
                        $amount = $row['amount'];                    
                    }
if ($reg == 1) {
mysql_query("UPDATE user SET credits=credits+'$amount' WHERE email='$email'");
mysql_query("UPDATE giftcode SET registered=0, amount=0, regby='$email' WHERE num='".mysql_real_escape_string($gc)."'");
header('location: /buy/?msgc=Your Gift Code Hasbeen Redeem Successfully!!!');
}else if ($reg == 0) {
header('location: /buy/?msgc=Sorry Your Giftcode Expired/Already Used/Not Tamvan');
}else if(empty($reg)) {
header('location: /buy/?msgc=Not Filled');
}
?>