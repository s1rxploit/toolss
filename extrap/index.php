<?php
include('../header.php');
?>
<title>Extrap</title>
<div id="left">
<ul id="menu" class="collapse">
<li>
<a href="/">
<i class="icon-home icon-white"></i>
<span>Dashboard</span></a>
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
<span>Card Checker</span>
<span class="label label-default"><?=$card;?></span>
</a>
</li>
<li class="panel active">
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
</li></ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> Extrap </h1>
</div>
</div>
<hr />
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-credit-card icon-white"></i>
<span>Extrap</span>
</div><div class="panel-body" align=center>
<form name="InpForm" onSubmit="return validateInput(this);"><br>
<input style="padding:7px;height:auto;width:135px;margin-bottom:0;border:1px solid #777;" type="TEXT" name="nomor" placeholder="434256499589xxxx">
<input style="padding:7px;height:auto;width:135px;margin-bottom:0;border:1px solid #777;" type="TEXT" name="exp" placeholder="0115">
<input style="padding:7px;height:auto;width:135px;margin-bottom:0;border:1px solid #777;" type="TEXT" name="cvv" placeholder="123">
<input style="padding:7px;height:auto;width:135px;margin-bottom:0;border:1px solid #777;" type="TEXT" disabled="disabled" name="delim" value="|" size="1"><br>
<input type="BUTTON" class="btn btn-primary" name="buat" onClick="findN(InpForm)" VALUE="Extrap Credit Card">
<p><textarea class="form-control" name="hasil" cols="60" rows="10" ></textarea>
<div id="jumlah" style="display: none;"></div><br></form>
</div>
</div>
</div>
</div>
<?php include'../bawah.php'; ?>