<?php
include('../header.php');
?>
<title>Api To Credit</title>
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
</li>
</ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> Api To Credit </h1>
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
<i class="icon-font"></i>
<span>Api To Credit</span>
</div>
<div class="panel-body">
<form action="/apicre/alien07.php" method="POST">
Please don't play bugs!' Only API Stripe.</p>
<p>If Api Live = <font color=green>20&#162;</font></p>
<p>If Api Die = <font color=red>10&#162;</font></p>
<p>if your use api "sk_test_xxxxxxx" = <font color=red>Banned</font></p>
<input type="text" name="api" placeholder="sk_live_Alien07pOTRskmZDMJ9m5dMIBY" class="form-control"/><button type="submit" class="btn btn-danger btn-round">Submit</button>
</form>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Api</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">API</th>
<th width="150px" class="center">Create Time</th>
<th width="80px" class="center">Status</th>
</tr>
<?php
                     $email = $_SESSION['email'];
                    $query = "SELECT * FROM api WHERE author='$email'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $code = $row['api'];
                        $date = $row['date'];
                        $registered = $row['status'];
                        $registered = str_replace('0','<font color=red>Die,</font>',$registered);
                        $registered = str_replace('1','<font color=green>Live</font>',$registered);
                        $registered = str_replace('2','<font color=green>Live</font>',$registered);
                        $registered = str_replace('3','<font color=red>Die</font>',$registered);
                        $usedby = $row['Regby'];
                        if ($registered) {
                        echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$code.'</td>';
	                echo '<td class="center">'.$date.'</td>';
	                echo '<td class="center">'.$registered.'</td>';
	                echo '</tr>';
                        } else {
                        $code = $code;
	                echo '<tr>';
	                echo '<td class="center">'.$no.'</span></td>';
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