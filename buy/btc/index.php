<?php
include('../../header.php');
$orderid = 'ALIEN07-BTC'.rand(10000000000,3000000000000);
$cre = $_POST['choice']*100;
$amount = $_POST['choice']*0.004476.' BTC';
$gets = file_get_contents('https://blockchain.info/id/api/receive?method=create&address=1DA5GMbS7hZazUHmo1katwRTVeK2RifZJr&callback=http://alien07.xyz');
$api = json_decode($gets, true);
$inputaddress = $api['input_address'];
$_SESSION['address'] = $api['input_address'];
$_SESSION['amount'] = $amount;
$_SESSION['orderid'] = $orderid;
if($cre < 0){


}
?>
<title>Pay With Bitcoin</title>
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
<h1> Payment Via Bitcoin </h1>
</div>
</div>
<hr />
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-font"></i>
<span>Payment via Bitcoin</span>
</div>
<div class="panel-body">
<form action="/buy/btc/check" method="post">
<h3 align="center">Thank you for ordering via Bitcoin</h3>
<h5>Payment Details:</h5>
Order ID: <b><?php echo $orderid; ?></b><br/>
Credits: <b><?php echo $cre; ?></b><br/>
BTC Address: <b style="color:#ff0000;"><?php echo $inputaddress; ?></b><br/>
Amount in BTC: <b style="color:#ff0000;"><?php echo $amount; ?></b>
<h5>Please do the following steps to complete your order:</h5>
1. Send <b style="color:#ff0000;"><?php echo $amount; ?></b> to adddress: <b style="color:#ff0000;"><?php echo $inputaddress; ?></b><br/>
2. Then click button "Complete Order"<br/>
<i style="color: #0000ff;font-size:20px;">* To get credits instantly, you need to click on button 'Complete Order'.<br/>
* Give admin 'Payment Details' above if you don't receive credits after 'Complete Order' clicked.</i>
<br/>
<button type="submit" class="btn btn-primary btn-round">Complete Order</button>
</form>
</div>
</div>
</div>
</div>
<?php include'../../bawah.php'; ?>