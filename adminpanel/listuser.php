<?php
include('../header.php');
?>
<title>List User</title>
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
<h1> List User </h1>
</div>
</div>
<hr />
<?php
$msg = $_GET['msg'];

if ($msg) {
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>'.$msg.' </div>';
}
if($admin==0){
?>
<script type="text/javascript">
window.location = "/?msg=YOU NOT ADMIN!!!!!"
</script>
<?

}


?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>List User</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">User</th>
<th width="150px" class="center">Status</th>
<th width="80px" class="center">Credit</th>
<th width="80px" class="center">Action</th>
</tr>
<?php
             
                    $ndauser = mysql_query ("SELECT email, COUNT(email) FROM user");
$kutuser = mysql_fetch_array($ndauser);
$limituser=$kutuser['COUNT(email)'];
                    $query = "SELECT * FROM user ORDER BY email LIMIT 0,$limituser";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                    $statusband=$row['banned'];
                    $mailuser=$row['email'];
                    $cre=$row['credits'];
          if($statusband==1){$statusnya='<font color=red>BANNED</font>';}else{$statusnya='<font color=green>NORMAL</font>';}
                        echo '<tr>';
	                echo '<td class="center">'.$no.'</td>';
	                echo '<td class="center">'.$mailuser.'</td>';
	                echo '<td class="center">'.$statusnya.'</td>';
	                echo'<td class="center">'.$cre.'</td>';
	                echo '<td class="center"><a href="edituser.php?user='.$mailuser.'">Edit</a></td>';
	                echo '</tr>';
                   
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