<?php
include('../../header.php');
?>
<title>User Profile</title>
<div id="left">
<ul id="menu" class="collapse">
<li>
<a href="/">
<i class="icon-home icon-white"></i>
Dashboard</a>
</li>
<li>
<a href="/acc">
<i class="icon-group icon-white"></i>
Account Checker
<span class="label label-default"><?=$acc;?></span>
</a>
</li><li>
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
<h1> User Profile </h1>
</div>
</div>
<hr />
<?php
$msg = $_GET['msg'];
if ($msg) {
echo '<div class="alert alert-warning">
<button type="button" class="close" data-dismiss="alert"><div class="icon-remove"></div></button>
<b>Note: </b>'.$msg.' </div>';
}
$email=$_SESSION['email'];
?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-user"></i>
<span>User Profile</span>
</div>
<div class="panel-body">
<form action="change.php" class="form-horizontal form-bordered form-validate" id="profile" method="POST">
<div class="form-group input-group">
<span class="input-group-addon">Email</span>
<input class="form-control" type="text" placeholder="<?php echo $email; ?>" disabled="disabled"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Invite By</span>
<input class="form-control" type="text" placeholder="<?php echo $invite; ?>" disabled="disabled"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Last Login</span>
<input class="form-control" type="text" placeholder="<?php echo $date; ?>" disabled="disabled"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Current Password</span>
<input type="password" class="form-control" name="password" data-rule-required="true" placeholder="******"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">New Password</span>
<input type="password" class="form-control" name="cpassword1" id="newPwd" placeholder="******"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Confirm Password</span>
<input type="password" class="form-control" name="cpassword2" data-rule-equalTo="#newPwd" placeholder="******"/>
</div>
<div class="form-actions">
<input type="submit" name="posting" value="Save changes" class="btn btn-danger btn-round"/>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include'../../bawah.php'; ?>