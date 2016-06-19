<?php

session_start();
function RandUnik($panjang) { 
   $pstring = "0123456789ABCDEFGHIJKLMZ"; 
   $plen = strlen($pstring); 
      for ($i = 1; $i <= $panjang; $i++) { 
          $start = rand(0,$plen); 
          $unik.= substr($pstring, $start, 1); 
      } 
 
    return $unik; 
} 
function RandUni($panjang) { 
   $pstring = "0123456789ABCDEFGHIJKLMZ"; 
   $plen = strlen($pstring); 
      for ($i = 1; $i <= $panjang; $i++) { 
          $start = rand(0,$plen); 
          $unik.= substr($pstring, $start, 1); 
      } 
 
    return $unik; 
} 
if (empty($_SESSION['email'])) {
header('location: /account'); 
}

include('../config.php');
                    $email = mysql_real_escape_string($_SESSION['email']);
                    $query = "SELECT * FROM user WHERE email='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $credits = $row['credits'];
                    }
                    $amount = $_POST['amount'];
                    if(empty($amount)){
                    header('location: /giftcode/?msg=Ups!! Amount Is Empty!!!'); 
                    exit;
                    }
                    if($amount == 0){
                    header('location: /giftcode/?msg=Ups!! Please fill Amount 1 ¢ Or Up !!!'); 
                    exit;
                    }
$code = RandUnik('4');
$code2 = RandUnik('4');
$code3 = RandUnik('4');
$gc = 'JH3-GC-'.$code.'-'.$code2.'-'.$code3;
  if ($credits < $amount) { 
header("location: /giftcode/?msg=Error. Your credit is less!");
exit;
   } else {
 $date = Date("d/m/20y");
mysql_query("INSERT INTO `giftcode`(`num`, `author`, `amount`, `registered`, `date`, `regby`) VALUES ('$gc','$email','$amount','1','$date','0')");
mysql_query("UPDATE user SET credits=credits-'$amount' WHERE email = '$email'");
header("location: /giftcode/?gc=$gc");
exit;
}?>