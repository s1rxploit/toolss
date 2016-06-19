<?php
include('../header.php');
?>
<title>Upgrade Account</title>
<div id="left">
<ul id="menu" class="collapse">
<li>
<a href="/">
<i class="icon-home icon-white"></i>
Dashboard</a>
</li>
<li>
<li>
<a href="/acc">
<i class="icon-group icon-white"></i>
Account Checker
<span class="label label-default"><?=$acc;?></span>
</a>
</li>
<li>
<a href="/card">
<i class="icon-credit-card icon-white"></i>
Card Checker
<span class="label label-default"><?=$card;?></span>
</a>
</li>
<li>
<a href="/free">
<i class="icon-th-large icon-white"></i>
<span>Free Tools</span>
<span class="label label-default"><?=$free;?></span>
</a>
</li>
<li>
<a href="/invitecode">
<i class="icon-gift icon-white"></i>
<span>Invite Code</span></a>
</li>
</ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> Upgrade Account </h1>
</div>
</div>
<hr />
<?php
$msg = $_GET['msg'];
if ($msg) {
echo '<div class="alert alert-warning">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<b>Note: </b>'.$msg.' </div>';
}

?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-white icon-user"></i>
<span>Upgrade Account</span>
</div>
<div class="panel-body">
<form action="/upgradetopaid/alien07.php" method="POST">
Upgrade Account To "Paid User" | JH3<br><br>
Benefits Paid User:<br>
-Can check gate1 to gate 5<br>
-Invite Code Prices cheaper<br>
-and others<br>
Price for each upgrade account is <b style="color: blue;">200&#162;</b>
<input type="hidden" name="do" value="buy">
<button type="submit" class="btn btn-primary btn-round" name="submit" onclick="return confirm('Are you sure to upgrade account ?');">Upgrade Now</button>
</form>
</div>
</div>
</div>
</div>
<?php include'../bawah.php'; ?>