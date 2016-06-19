<?php
include('../header.php');
?>
<title>Gift Code</title>
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
<span>Account Checker</span>
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
<h1> Gift Code </h1>
</div>
</div>
<hr />
<?php
$gc = $_GET['gc'];
$msg = $_GET['msg'];
if ($gc) {
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>Pembelian Gift Code Sukses! Gift Code Kamu Adalah: '.$gc.' </div>';
}
if ($msg) {
echo '<div class="alert alert-warning">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>'.$msg.' </div>';
}
?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-font"></i>
<span>Gift Code</span>
</div>
<div class="panel-body">
<form action="/giftcode/alien07.php" method="POST">
Gift Code | Alien07<br><br>
Price for each gift code is 1 &#162; = 1 &#162;
<div class="form-group input-group">
Amount : 
<input name="amount" class="form-control" placeholder="1000" type="text"><button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure to buy gift code?');">Buy Now</button>
</div>
</form>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Gift Code</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">Gift Code</th>
<th width="150px" class="center">Create Time</th>
<th width="10px" class="center">Amount</th>
<th width="85px" class="center">Used By</th>
</tr>
<?php
                  
                    $email = $_SESSION['email'];
                    $exe = mysql_query("SELECT * FROM giftcode WHERE author='$email'");
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $code = $row['num'];
                        $date = $row['date'];
                        $registered = $row['registered'];
                        $usedby = $row['regby'];
                        $amount = $row['amount'];
                        if ($registered == 0) {
                        $code = '<strike>'.$code.'</strike>';
                        echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$code.'</td>';
	                echo '<td class="center">'.$date.'</td>';
	                echo '<td class="center">'.$amount.' &#162;</td>';
	                echo '<td class="center">'.$usedby.'</td>';
	                echo '</tr>';
                        } else {
                        $code = $code;
	                echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$code.'</td>';
	                echo '<td class="center">'.$date.'</td>';
	                echo '<td class="center">'.$amount.' &#162;</td>';
	                echo '<td class="center"></td>';
	                echo '</tr>';
                        }
                    $no++;
                    }
                    
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<?php include'../bawah.php';?>