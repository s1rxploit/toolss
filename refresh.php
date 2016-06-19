<?php

include'config.php';
  $ndauser = mysql_query ("SELECT email, COUNT(email) FROM user");
$kutuser = mysql_fetch_array($ndauser);
$limituser=$kutuser['COUNT(email)'];
                    $query = "SELECT * FROM user ORDER BY email LIMIT 0,$limituser";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                    $band=$row['banned'];
                    $email=$row['email'];
                    $cre=$row['credits'];
                    $admin=$row['admin'];
                   if ($cre < 0) {           
mysql_query("DELETE FROM `user` WHERE email='$email'");
$deleteduser[]=1;
}
if (strpos($email,'@') == false) {
mysql_query("DELETE FROM `user` WHERE email='$email'");
$deleteduser[]=1;
}else{
$cekvalidemail=explode('@',$email);
if (strpos($cekvalidemail[1],'.') == false) {
mysql_query("DELETE FROM `user` WHERE email='$email'");
$deleteduser[]=1;
}
}
if($band==1){
mysql_query("DELETE FROM `user` WHERE email='$email'");
$deleteduser[]=1;
}
}
$apinda = mysql_query ("SELECT api, COUNT(api) FROM api");
$kutapi = mysql_fetch_array($apinda);
$limitapi=$kutapi['COUNT(api)'];
                    $queryapi = "SELECT * FROM api ORDER BY api LIMIT 0,$limitapi";
                    $exeapi = mysql_query($queryapi);
                    while($rowapi = mysql_fetch_assoc($exeapi)){
                    $apistatus=$rowapi['status'];
if ($apistatus == 3) {
mysql_query("DELETE FROM `api` WHERE status='3'");
$deletedapi[]=1;
}
}




echo 'DELETED USER : '.count($deleteduser).'<br/>DELETED API : '.count($deletedapi);















































?>