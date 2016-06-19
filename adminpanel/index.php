<?php
include('../header.php');
?>
<title>Admin Panel</title>
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
<h1> Admin Panel </h1>
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
<span>Admin Panel</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">Name</th>
</tr>
<tr>
<td>1</td>
<td><a href="/adminpanel/listuser.php">List User</a></td>
</tr>
<tr>
<td>2</td>
<td><a href="/adminpanel/editnews.php">Edit/Add News</a></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<?php include'../bawah.php';?>