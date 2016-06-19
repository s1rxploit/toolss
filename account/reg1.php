<?php 
include("../config.php");
$email = $_GET['email'];
$email = mysql_real_escape_string($email);
$pass = mysql_real_escape_string($_GET['password']);
$pass = md5(md5(md5($pass)));
$ic = mysql_real_escape_string($_GET['invite_code']);
$cekic=mysql_query("SELECT * FROM `invitecode` WHERE Num = '".$ic."' AND Registered = 1");
while($row = mysql_fetch_assoc($cekic)){
                        $author = $row['Author'];                    
                        $berapa = $row['Registered'];                    
                    }
if ($berapa == 1) {
mysql_query("INSERT INTO user (email,password,credits,banned,admin,regby,invitecode) VALUES('$email','$pass',20,0,0,'$author','$ic')");
mysql_query("UPDATE invitecode SET Registered=0, Regby='$email' WHERE Num='$ic'");
header('location: /account/?success');
} else if ($berapa == 0) {
$cekicpaid=mysql_query("SELECT * FROM `invitecodepaid` WHERE Num = '".$ic."' AND Registered = 1");
while($rowpaid = mysql_fetch_assoc($cekicpaid)){
                        $authorpaid = $rowpaid['Author'];                    
                        $berapapaid = $rowpaid['Registered'];                    
                    }
if ($berapapaid == 1) {
mysql_query("INSERT INTO user (email,password,credits,banned,admin,orders,regby,invitecode) VALUES('$email','$pass',20,0,0,0,'$authorpaid','$ic')");
mysql_query("UPDATE invitecodepaid SET Registered=0, Regby='$email' WHERE Num='$ic'");
header('location: /account/?success');
} else if ($berapapaid == 0) {
$cekicforpaid=mysql_query("SELECT * FROM `invitecodeforpaid` WHERE Num = '".$ic."' AND Registered = 1");
while($rowforpaid = mysql_fetch_assoc($cekicforpaid)){
                        $authorforpaid = $rowforpaid['Author'];                    
                        $berapaforpaid = $rowforpaid['Registered'];                    
                    }
if($berapaforpaid == 1){
mysql_query("INSERT INTO user (email,password,credits,banned,admin,orders,regby,invitecode) VALUES('$email','$pass',50,0,2,0,'$authorforpaid','$ic')");
mysql_query("UPDATE invitecodeforpaid SET Registered=0, Regby='$email' WHERE Num='$ic'");
header('location: /account/?success');
} else if($berapaforpaid == 0){
header('location: /account/?invalid');
} else if (empty($berapaforpaid)) {
header('location: /account/?invalid');
}
} else if (empty($berapapaid)) {
header('location: /account/?invalid');
}
} else if (empty($berapa)) {
header('location: /account/?invalid');
}
?>