<?php
include('../header.php');
?>
<title>Invite Code [Paid User]</title>
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
<li class="panel active">
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
<h1> Invite Code [Paid User] </h1>
</div>
</div>
<hr />
<?php
$ic = $_GET['ic'];
$msg = $_GET['msg'];
if ($ic) {
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>Pembelian Invite Code Sukses! Invite Code Kamu Adalah: '.$ic.' </div>';
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
<span>Invite Code [Paid User]</span>
</div>
<div class="panel-body">
<form action="/inviteforpaid/alien07.php" method="POST">
When a friend wanna create an account on this site, he needs an <b>Invite Code</b>.<br>You will give him these codes for free or <b style="color: red;">&nbsp;for money</b>, whatever you want!<br>If he use your code to register, he will be set to your referrals automatically.<br><font color=red>HARAP CATAT INVITE CODE | PLEASE SAVE INVITE CODE</font><br><br>
Price for each invite code is <b style="color: blue;">300 &#162;</b>
<button type="submit" class="btn btn-primary btn-round" name="submit" onclick="return confirm('Are you sure to buy code?');">Buy Now</button>
</form>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Invite Code [Paid User]</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">Invite Code</th>
<th width="150px" class="center">Create Time</th>
<th width="80px" class="center">Used By</th>
</tr>
<?php
                  
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM invitecodeforpaid WHERE Author='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $code = $row['Num'];
                        $date = $row['Date'];
                        $registered = $row['Registered'];
                        $usedby = $row['Regby'];
                        if ($registered == 0) {
                        $code = '<strike>'.$code.'</strike>';
                        echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$code.'</td>';
	                echo '<td class="center">'.$date.'</td>';
	                echo '<td class="center">'.$usedby.'</td>';
	                echo '</tr>';
                        } else {
                        $code = $code;
	                echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$code.'</td>';
	                echo '<td class="center">'.$date.'</td>';
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