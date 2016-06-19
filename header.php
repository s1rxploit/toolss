<?php

session_start();

if (empty($_SESSION['email'])){
header('location: /account'); 
}
$card=5;
$free=3;
$acc=1;
include('config.php');
  $queryw = "SELECT * FROM news WHERE id IN(SELECT MAX(id) FROM news)";
                    $exew = mysql_query($queryw);
                    while($roww = mysql_fetch_assoc($exew)){
                        $news = $roww['message']; 
                       
                    }
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM user WHERE email='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $invite = $row['regby']; 
                        $credits = $row['credits'];    
                        $banned = $row['banned'];                    
                        $admin = $row['admin']; 
                        $orders = $row['orders']; 
                    }
$cekuser = mysql_query("SELECT * FROM user WHERE email = '".$_SESSION["email"]."'");
$jumlah = mysql_num_rows($cekuser);
if($jumlah == 0) {
session_destroy();
header('location: /account/');
}
if ($banned == 1) {
session_destroy();
header('location: /account/?banned');
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="robots" content="noindex"/>
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<script type="text/javascript" src="/assets/alien07/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/jquery.gritter.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/eakroko.min.js"></script>
<script type="text/javascript" src="/assets/alien07/js/application.min.js"></script>
<script type="text/javascript" src="/assets/alien07/checkers.js"></script>
<script type="text/javascript" src="/assets/alien07/extrap.js"></script>
<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" href="/assets/css/theme.css" />
<link rel="stylesheet" href="/assets/css/MoneAdmin.css" />
<link rel="stylesheet" href="/assets/plugins/Font-Awesome/css/font-awesome.css" />
<link href="/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link href="/assets/css/layout2.css" rel="stylesheet" />
<link href="/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
<link rel="stylesheet" href="/assets/plugins/timeline/timeline.css" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="/assets/img/favicon.ico"/>
</head>
<body class="padTop53 ">
<div id="wrap" >
<div id="top">
<nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
<a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
<i class="icon-align-justify"></i>
</a>
<header class="navbar-header"><a href="/" class="navbar-brand"><img src="/assets/img/logoku.png" style="width:100px;height:25px;"></a></header>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                           <i class="icon-user "></i>&nbsp;List Admin <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-messages">
                                <li>
<a href="https://www.facebook.com/jenggot.adjha">
<img src="http://graph.facebook.com/jenggot.adjha/picture?width=100&height=100" alt="image" class="img-circle"/>
<h4> AD1417TO</h4>
</a>
</li>                                </a>
                            <li class="divider"></li>
                            <li>
<a href="https://www.facebook.com/jeenggottaddjhaa.korbandragraciing">
<img src="http://graph.facebook.com/jeenggottaddjhaa.korbandragraciing/picture?width=100&height=100" alt="image" class="img-circle"/>
<h4> Jenggot</h4>
</a>
</li>                                </a>
                            
                        </ul>

                    </li>
                    
<li><a href="/upgradetopaid">
<i class="icon-credit-card icon-white"></i>&nbsp; 
Upgrade
</a></li>                    
<li><a href="/buy">
<i class="icon-credit-card icon-white"></i>&nbsp; 
Credits (&#162;)
<span class="label label-danger"><?=$credits;?></span>
</a></li>
<li><a href="/orders">
<i class="icon-truck icon-white"></i>&nbsp; 
Orders
<span class="label label-default"><?=$orders;?></span>
</a></li>
<li><a href="/giftcode">
<i class="icon-gift icon-white"></i>&nbsp;
Gift Code</a>
</li>
<li><a href="/buy">
<i class="icon-plus icon-white"></i>&nbsp;
Buy Credits</a>
</li>
<?php if($admin==1){ ?>
<li><a href="/adminpanel"><i class="icon-user "></i>&nbsp;
Admin Panel</a></li>
<?php } ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i> <?php
$email = strtoupper($email);
$email = explode("@",$email);
$email = explode(".",$email[0]);
echo ''.$email[0].'';
?> <i class="icon-chevron-down "></i></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
<?
                            echo'<li><a href="#"><i class="icon-envelope"></i> Email: '.$_SESSION['email'].'</a>
                            </li>';
?>

<?php
$date = date("d/m/20y");
echo '<li><a href="#"><i class="icon-signin"></i> Last Login: '.$date.'</a>
                            </li>';
?>
                            <li><a href="/invitecode"><i class="icon-gift"></i> Invite Code</a>
                            </li>
                            <li><a href="/account/profile"><i class="icon-gear"></i> Account Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="/account/logout"><i class="icon-signout"></i> Logout</a>
                            </li>
                        </ul>

                    </li>
</ul>
<ul class="nav navbar-top-links navbar-center">
<marquee><?=$news;?></marquee>
</ul>
</nav>
</div>

<script src="http://repository.chatwee.com/scripts/d544aaafea95644a0fb179ff36bd9b5e.js" type="text/javascript" charset="UTF-8"></script>