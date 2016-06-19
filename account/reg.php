<?php
require_once('../config.php');
$username = $_POST['email'];
if (strpos($username,'@') == false) {
header('location: /account/?msg=UPSS!! Please Use Real Email');
}
$username = mysql_real_escape_string($username);
$password = $_POST['password'];
$ic = $_POST['invite_code'];
$cekuser = mysql_query("SELECT * FROM user WHERE email = '$username'");
if(mysql_num_rows($cekuser) == 1) {
header('location: /account/?msgr=Ups!! User With Email '.$username.' Is Already Registered!');
} else {
if(!$username || !$password) {
header('location: /account/?msgr=Ups!! Email And Password Is Empty');
} else {
$simpan = 1;
if($simpan) {
header('location: /account/reg1.php?email='.$username.'&password='.$password.'&invite_code='.$ic);
} else {
header('location: /account/?msgr=Error');
}
}
}
?>