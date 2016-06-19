<?php

$totaluser = mysql_query("SELECT * FROM user");
$totaluser = mysql_num_rows($totaluser);
$paiduser = mysql_query("SELECT * FROM user WHERE admin=2");
$paiduser = mysql_num_rows($paiduser);
$freeuser = mysql_query("SELECT * FROM user WHERE admin=0");
$freeuser = mysql_num_rows($freeuser);
if($admin==0){
$type='Free User';
}
if($admin==1){
$type='Admin';
}
if($admin==2){
$type='Paid User';
}
$api = mysql_query("SELECT * FROM api WHERE status=1");
$api = mysql_num_rows($api);
if ($api > 30) {
$stapi = '<font color=green>Very Normal</font>';
}
if ($api < 20) {
$stapi = '<font color=blue><b>Normal</b></font>';
}
if ($api < 10) {
$stapi = '<font color=red><b>Need More Api!</b></font>';
}
?>

<div class="well well-small">
<ul class="list-unstyled">
<li>Your Account Type: <strong><font color=blue><?php echo $type;?></font></strong></li>
<li>Domain: <strong><font color="orange">just-news.tk</font></strong></li>
<li>Total User(s): <strong><font color=red><?php echo $totaluser;?></font></strong></li>
<li>Free User(s): <strong><font color=bluelight><?php echo $freeuser;?></font></strong></li>
<li>Paid User(s): <strong><font color=cyan><?php echo $paiduser;?></font></strong></li>
<li>Total API Live: <strong><font color=black><?php echo $api; ?></font></strong> API </li>
<li><strong><center>[<?php echo $stapi; ?>]</center></strong></li>
</ul></div>
<div id="check-progress">
<div class="well well-small">
<div class="left check-amount">
Progress: 0/0
</div>

<div class="progress mini">
<div class="progress-bar progress-bar-info bar" style="width: 0%"></div>
</div>
</div>
</div>
</div>