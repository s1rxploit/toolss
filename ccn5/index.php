<?php
include'../header.php';
?>
<title>CCN Gate 5</title>
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
<li class="panel active">
<a href="/card">
<i class="icon-credit-card icon-white"></i>
<span>Card Checker</span>
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
</li></ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> CCN Gate 5 </h1>
</div>
</div>
<hr />
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
<b>Note: </b>Support Visa, Amex and Master Card. Charge $0.5-$2. Randomize Charge For Anti Merchant Die.</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-list-ul"></i>
<span>CCN Gate 5</span>
</div>
<div class="panel-body">
<form action="" method="post" class='form-vertical'>
<div class="col-lg-6">
<label for="mailpass" class="control-label">Resource:</label>
<textarea name="mailpass" id="mailpass" class="form-control" rows="7" placeholder="53012724539xxxxx|05|14|653"></textarea>
</div>
<div class="col-lg-4">
<label>Status Check:</label>
<p><font color=green><b>Live</b></font> : This Card Is Live or Approve In My Merchant.</p>
<p><font color=red><b>Die</b></font> : This Card Is Die or Declined In My Merchant. But CVV Is Correct.<p>
<p><font color=purple><b>Unknown</b></font> : This Card Is Unknown[Wrong Format] or Declined Because CVV Is Incorrect.</p>
<p><font color=blue><b>Api Key Expired</b></font> : Add api stripe at <a href="/freecredit"><b>Api To Credit</b></a> and get +20&#162;</p>
<button type="button" class="btn btn-access" id="submit">Submit</button>
<button type="button" class="btn btn-danger" id="stop">Stop</button> &nbsp; <span id="checkStatus"> </span>
</form>
</div>
</div>
</div>
<div id="result">
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>LIVE </span><span class="label label-success" id="tvmit_live_count">0</span>
</div><div class="panel-body" id="tvmit_live"></div></div>
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>DIE</span><span class="label label-danger" id="tvmit_die_count">0</span></div><div class="panel-body" id="tvmit_die"></div></div>
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>Wrong Format</span><span class="label label-default" id="tvmit_wrong_count">0</span></div><div class="panel-body" id="wrong"></div></div>
</div>
</div>
</div>
<script type='text/javascript'>
$(window).on('beforeunload', function(e){
		return "Please save your data before leaving.";
	});
</script>
<?php include'../bawah.php'; ?>