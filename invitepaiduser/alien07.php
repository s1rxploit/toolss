<?php

session_start();

if (empty($_SESSION['email'])) {
header('location: /account'); 
}

include('../config.php');
                      $email = mysql_real_escape_string($_SESSION['email']);
                    $query = "SELECT * FROM user WHERE email='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $invite = $row['regby']; 
                        $credits = $row['credits'];    
                        $banned = $row['banned'];                    
                        $admin = $row['admin']; 
                    }
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
$code = RandUnik('4');
$code2 = RandUnik('4');
$code3 = RandUnik('4');
$ic = 'JH3_Paid-'.$code.'-'.$code2.'-'.$code3;
if($admin == 0){
header("location: /invitepaiduser/?msg=Error!!! Your Account Is Free User!!");
exit;
}
if($credits < 100) { 
header("location: /invitepaiduser/?msg=Error. Your credit is less!");
exit;
}else{
$date = Date("d/m/20y");
mysql_query("INSERT INTO `invitecodepaid`(`Num`, `Author`, `Registered`, `Date`, `Regby`) VALUES ('$ic','$email','1','$date','0')");
mysql_query("UPDATE user SET credits=credits-100 WHERE email = '$email'");
header("location: /invitepaiduser/?ic=$ic");
exit;
}
 
 ?>