<?php
include('../../config.php');
 
session_start();
 
//tangkap data dari form login
$cpassword1 = $_POST['cpassword1'];
$cpassword1 = md5(md5(md5($cpassword1)));
$cpassword2 = $_POST['cpassword2'];
$cpassword2 = md5(md5(md5($cpassword2)));
$password = $_POST['password'];
$password = mysql_real_escape_string($password);
$password = md5(md5(md5($password)));
$email = $_SESSION['email'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
 
$email = mysql_real_escape_string($email);
 
//cek data yang dikirim, apakah kosong atau tidak
if (empty($cpassword1)) {
    //kalau password 1 kosong
    header('location:/account/profile/?msg=Data have not been filled completely');
    break;
} else if (empty($cpassword2)) {
    //kalau password 2 kosong
    header('location:/account/profile/?msg=Data have not been filled completely');
    break;
} else if (empty($password)) {
    //kalau password lama kosong
    header('location:/account/profile/?msg=Data have not been filled completely');
    break;
}
 
$q = mysql_query("select * from user where email='$email' and password='$password'");
if ($cpassword1 == $cpassword2) {
    //kalau password dan confirm password sama
    if (mysql_num_rows($q) >= 1) {
        //kalau password lama sama
        //langsung ganti password
        //redirect ke halaman sukses
        $updatepassword = "UPDATE user SET password = '$cpassword1' where email = '$email'";
        $updatequery = mysql_query($updatepassword);
        header('location:/account/profile/?msg=Change password success!');
    } else {
        //kalau password lama tidak sama
        header('location:/account/profile/?msg=Old password not correctly!');
    }
    
} else {
     //kalau password baru beda dengan confirm password
     header('location:/account/profile/?msg=Please fill confirm password correctly!');
}

?>