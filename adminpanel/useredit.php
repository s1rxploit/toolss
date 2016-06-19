<?php
session_start();

if(empty($_SESSION['email'])){
header('location: /account');
}

if(empty($_SESSION['admin'])){
header('location: /adminpanel/listuser.php');
}
if($_SESSION['admin']==0){
header('location: /?msg=YOU NOT ADMIN!!!!!');
}

include('../config.php');

if($_GET['user']){

$ngmail=$_GET['user'];
$username = mysql_real_escape_string($ngmail);
$uplink=$_SESSION['email'];
	             $cekuser = mysql_query("SELECT * FROM user WHERE email='$ngmail'");
$jumlah = mysql_num_rows($cekuser);
if($jumlah==1){
     $query = "SELECT * FROM user WHERE email='$ngmail'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $ngemail = $row['email']; 
                        $credit = $row['credits'];    
                        $bannednya = $row['banned'];                    
                        $admin = $row['admin']; 
                    }
                    if($admin==0){
$type='Free User';
}
if($admin==1){
$type='Admin';
}
if($admin==2){
$type='Paid User';
}
         if($_POST['posting']){
                $ucre=$_POST['updatecre'];
                $cre=$_POST['cre'];
                $aksi=$_POST['aksi'];
                $topup=$_POST['topup'];
                $topcre=$_POST['topcre'];
                $topamount=$_POST['topamount'];
                $ban=$_POST['status'];
                $uban=$_POST['updatestatus'];
                $mail=$_POST['email'];
                $umail=$_POST['updatemail'];
                $tipenya=$_POST['tipe'];
                $utipe=$_POST['updatetipe'];
                if($tipenya==0){
                $tipe='Free User';
                }
                if($tipenya==1){
                $tipe='Admin';
                }
                if($tipenya==2){
                $tipe='Paid User';
                }
                 if($utipe==1){
                 mysql_query("UPDATE `user` SET `admin`='$tipenya' WHERE email='$ngemail'");
$form.='======================<br/>
UPDATE STATUS ALIEN07 SUCCESS
<br/>
[-] User : '.$ngemail.'
<br/>
[-] From :  '.$type.' 
<br/>
[-] Become : '.$tipe.'
<br/>
======================';
                 }
                 
                 if($umail==1){
                 mysql_query("UPDATE `user` SET `email`='$mail' WHERE email='$ngemail'");
$form.='======================<br/>
UPDATE EMAIL ALIEN07 SUCCESS
<br/>
[-] From :  '.$ngemail.' 
<br/>
[-] Become : '.$mail.'
<br/>
======================';
                 }
                
                 if($topup==1){
                 $pluscre=$credit+$topcre;
                 $date = Date("d/m/20y");
                 $orderid = 'ALIEN07-PLS'.rand(10000000000,3000000000000);
                 mysql_query("UPDATE `user` SET `credits`='$pluscre', `orders`=orders+1 WHERE email='$mail'");
                 mysql_query("INSERT INTO `orders`(id, email, amount, credit, payment, date) VALUES ('$orderid','$mail','".$topamount."rb','$topcre','Pulsa','$date')");
$pesan1  = "Kamu Telah Menerima Credit Dari Alien07 \n\n 
DETAIL TRANSAKSI :\n\n 
ORDER ID: ".$orderid."\n\n
JUMLAH: ".$topamount."rb\n\n
JUMLAH CREDIT: ".$topcre."\n\n";
$title1='Kamu Telah Menerima Credit Dari Alien07';
$header1 = 'From: Alien07 <noreply@alien07>';
$kirimEmail1 = mail($mail, $title1, $pesan1, $header1);
                 $form.='======================<br/>
TOP UP ALIEN07 SUCCESS
<br/>
[-] User :  '.$mail.' 
<br/>
[-] Status : '.$type.'
<br/>
[-] Credits : '.$topcre.'
<br/>
[-] Amount : '.$topamount.'rb
<br/>
[-] Payment : Pulsa
<br/>
[-] ID : '.$orderid.'
<br/>
======================';
                 
                 
                 
                 
                 }
                 if($uban==1){
                 if($ban==1){
                 mysql_query("UPDATE `user` SET `banned`='$ban' WHERE email='$mail'");
$form.='======================
<br/>
BANNED ACCOUNT ALIEN07 SUCCESS
<br/>
[-] User :  '.$mail.' 
<br/>
======================';
                 }
                 if($ban==0){
                 mysql_query("UPDATE `user` SET `banned`='$ban' WHERE email='$mail'");
$form.='======================<br/>
UNBANNED ACCOUNT ALIEN07 SUCCESS
<br/>
[-] User :  '.$mail.' 
<br/>
======================';
                 }
                 }
                 if($ucre==1){
                 if($cre > 0){
                 if($aksi==1){
                 $pluscre=$credit+$cre;
                 mysql_query("UPDATE `user` SET `credits`='$pluscre' WHERE email='$mail'");
                 $form.='======================<br/>
ADD UP ALIEN07 SUCCESS
<br/>
[-] User :  '.$mail.' 
<br/>
[-] Amount : '.$cre.'
<br/>
======================';
                 }
                 if($aksi==2){
                 $mincre=$credit-$cre;
                 mysql_query("UPDATE `user` SET `credits`='$mincre' WHERE email='$mail'");
                 $form.='======================<br/>
DELETE CREDIT ALIEN07 SUCCESS
<br/>
[-] User :  '.$mail.' 
<br/>
[-] Amount : '.$cre.'
<br/>
======================';
                 }
                 }
                 }
                 if($uban==2 && $ucre==2 && $topup==2 && $umail==2 && $utipe==2){
                 $form='Tidak Ada Yang Bisa Di Edit!!!';
                 }
echo'<html><head><title>Update User</title></head><body><center><font size="10">UPDATE USER</font><hr>';           
echo $form;
echo'<br/><a href="/adminpanel/listuser.php">Back</a></center></body></html>';
}else{
header("location: /adminpanel/listuser.php?msg=ups!!.. FORM EMPTY!!");           
}
}else{                
header("location: /adminpanel/listuser.php?msg=ups!!.. USER DOES NOT EXISTS!!");
}
}else{
header("location: /adminpanel/listuser.php?msg=ups!!.. USER IS EMPTY!!");	
}
?>