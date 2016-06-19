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
if($admin == 2){
header("location: /upgradetopaid/?msg=Error!!! Your Account Is Already Paid User!!");
exit;
}
if($admin == 1){
header("location: /upgradetopaid/?msg=Error!!! Your Account Is Already Admin!!!");
exit;
}
if ($credits < 200) { 
header("location: /upgradetopaid/?msg=Error!!! Your credit is less!!!");
exit;
} else {
 $date = Date("d/m/20y");
mysql_query("UPDATE user SET admin='2' WHERE email = '$email'");
mysql_query("UPDATE user SET credits=credits-200 WHERE email = '$email'");
header("location: /upgradetopaid/?msg=Your Account Hasbeen Upgrade To Paid User!!!");
exit;

}
?>