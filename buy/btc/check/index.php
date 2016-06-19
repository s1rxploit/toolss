<?php
session_start();
include('../../../config.php');
$email = $_SESSION['email'];
if(empty($email)){
header('location: /account');
}
if(empty($_SESSION['address'])){
header('location: /buy');
}
$id = $_SESSION['orderid'];
$amount = $_SESSION['amount'];
$address = $_SESSION['address'];
$received = file_get_contents('https://blockchain.info/id/address/'.$address.'?format=json');
$cek = json_decode($received);
$jumlah = $cek->total_received;
if ($jumlah < 1) {
header('location: /buy/?msg=Payment failed. Please send to new address!');
} else if ($jumlah > 0) {
$date = date("d/m/20y");
$totalcre = $jumlah/100000000;
$sendcre = $jumlah*23200;
$totalsendcre = ceil($sendcre/100000000);
$addcre = mysql_query("UPDATE `user` SET `credits`=credits+$totalsendcre, `orders`=orders+1 WHERE email='$email'");
$addord = mysql_query("INSERT INTO `orders`(id, email, amount, credit, payment, date) VALUES ('$id','$email','$amount','$totalsentcre','BTC','$date')");
$pesan  = "Kamu Telah Menerima Pembayaran Dari ".$email." \n\n 
DETAIL TRANSAKSI :\n\n 
ORDER ID: ".$id."\n\n
JUMLAH: ".$amount."\n\n
JUMLAH CREDIT: ".$totalsentcre."\n\n";
$title='Kamu Telah Menerima Pembayaran Dari '.$email;
$header = 'From: Alien07 <noreply@alien07>';
$kirimEmail = mail('halidramadhan77@gmail.com', $title, $pesan, $header);
$pesan1  = "Kamu Telah Menerima Credit Dari Alien07 \n\n 
DETAIL TRANSAKSI :\n\n 
ORDER ID: ".$id."\n\n
JUMLAH: ".$amount."\n\n
JUMLAH CREDIT: ".$totalsentcre."\n\n";
$title1='Kamu Telah Menerima Credit Dari Alien07';
$header1 = 'From: Alien07 <noreply@alien07>';
$kirimEmail1 = mail($email, $title1, $pesan1, $header1);
header('location: /buy/?msg=Payment Via Bitcoin Success!! With ID '.$id.'');
}
?>