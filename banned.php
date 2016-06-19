<?php
include'config.php';
$query = "SELECT * FROM user ORDER BY RAND() LIMIT 0,100";
                    $exe = mysql_query($query);
                    while($row = mysql_fetch_assoc($exe)){
                    $statusband=$row['banned'];
                    $mailuser=$row['email'];
                    $cre=$row['credits'];
                           mysql_query("UPDATE `user` SET `banned`='1'WHERE email='$mailuser'");

                   
                    }
                    ?>