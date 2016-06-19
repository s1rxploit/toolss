<?php
session_start();
error_reporting(0); 
if (empty($_SESSION['email'])) {
header('location: /account');
break;
}
$charge = rand(50,400);
$email = $_SESSION['email'];
include('../config.php');
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM user WHERE email='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $credits = $row['credits'];                    
                    }
$api = $_POST['api'];
$cek = mysql_query("SELECT * FROM `api` WHERE api='$api'");
$cek = mysql_num_rows($cek);
$cekapi = substr($api, 0, 7);
if ($cekapi == 'sk_test') {
$ban=1;
mysql_query("UPDATE `user` SET `banned`='$ban' WHERE email='$email'");
session_destroy();
header('location: /account/?banned');
break;
}
if ($cek > 0) {
header('location: /apicre/?msg=Already used');
break;
}
$date = date("d/m/20y");
$email = $_SESSION['email'];
$hasil = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/cstapi/ngecekapi.php?ccn=4388576078808105&ccm=08&ccy=18&cvv=838&api='.$api);
$a = json_decode($hasil, true);
$b = $a['status'];
if ($b == 1) {
$aq = mysql_query("UPDATE `user` SET `credits`=credits+20 WHERE email='$email'");
$an = mysql_query("INSERT INTO `api`(`api`, `author`, `status`, `date`) VALUES ('$api','$email',1,'$date')");
while($row = mysql_fetch_assoc($exe)){
$credits = $row['credits'];                    
}
$credits = $credits+20;
header('location: /apicre/?msg=Success! Your credits add to 20!');
break;
} if ($b == 2) {
$aq = mysql_query("UPDATE `user` SET `credits`=credits+20 WHERE email='$email'");
$an = mysql_query("INSERT INTO `api`(`api`, `author`, `status`, `date`) VALUES ('$api','$email',1,'$date')");
while($row = mysql_fetch_assoc($exe)){
$credits = $row['credits'];                    
}
$credits = $credits+20;
header('location: /apicre/?msg=Success! Your credits add to 20!');
break;
} if ($b == 3) {
mysql_query("UPDATE `user` SET `credits`=credits-10 WHERE email='$email'");
header('location: /apicre/?msg=Status: Die');
break;
}
mysql_query("UPDATE `user` SET `credits`=credits-10 WHERE email='$email'");
header('location: /apicre/?msg=Status: Die');
break;
?>