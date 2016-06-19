<?php
session_start();
include'../config.php';
if(!empty($_POST['pass'])){
if(!empty($_POST['mail'])){
$username = $_POST['mail'];
$username = mysql_real_escape_string($username);
$pass = $_POST['pass'];
$pass = md5(md5(md5($pass)));
$cekuser = mysql_query("SELECT * FROM user WHERE email = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {
header('location: /account/?msgr=Ups!! Email '.$username.' Is Not Registered!!');
} else {
if($pass <> $hasil['password']) {
header('location: /account/?msgr=Ups!! Password You Enter Is Wrong!');
} else {
$_SESSION['email'] = $username;
header('location: /');
}
}
}else{
header('location: /account/?msgr=Ups!! Email Is Empty!');
}
}else{
header('location: /account/?msgr=Ups!! Password Is Empty!');
}
?>