<?php include'../header.php'; ?>
<title>Buy Credits</title>
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
<h1> Buy Credit </h1>
</div>
</div>
<hr />

<?php
$msgc = $_GET['msgc'];
if ($msgc) {
echo '<div class="alert alert-warning">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<b>Note: </b>'.$msgc.' </div>';
}
$msg = $_GET['msg'];
if ($msg) {
echo '<div class="alert alert-warning">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<b>Note: </b>'.$msg.' </div>';
}

?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-gift"></i>
<span>Redeem Code</span>
</div>
<div class="panel-body">
<form action="/buy/redeem/" method="POST">
<div class="form-group input-group">
Enter Gift Code : 
<input name="redeem" class="form-control" placeholder="ALIEN07-GC-6AH9-0L4G-67AL" type="text"><button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure to redeem gift code?');">Redeem</button>
</div>
</form>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>List Plans via BITCOIN</span>
</div>
<div class="panel-body">
<form action="/buy/btc/" method="POST">
<table class="table table-nomargin table-hover table-bplaned">
<thead>
<tr>
<th width="30px" class="center">#</th>
 
<th class="center">Credits</th>
<th class="center">Choice</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">Minimum</td>
 
<td class="center">100&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">Maximum</td>
 
<td class="center">5000&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
</tbody>
</table>
<div class="form-group input-group">
<input name="choice" class="form-control" placeholder="1" style="width:35px;" type="text"><span class="input-group-addon" style="width:30px !important;">x100 &#162;</span><button class="btn btn-primary" type="submit">Buy Now</button>
</div>
</form>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>List Plans via Pulsa</span>
</div>
<div class="panel-body">
<form action="http://facebook.com/standbymamad" method="POST">
<table class="table table-nomargin table-hover table-bplaned">
<thead>
<tr>
<th width="30px" class="center">#</th>
 
<th class="center">Credits</th>
<th class="center">Choice</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">Minimum</td>
 
<td class="center">100&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">Maximum</td>
 
<td class="center">5000&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
</tbody>
</table>
<div class="form-vertical control-group">
<center><p style="color:#ff0000;"> Harga 100&#162; adalah Rp 10.000-, </p><button class="btn btn-primary btn-round" type="submit">Buy Now</button></center>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<?php include'../bawah.php'; ?>