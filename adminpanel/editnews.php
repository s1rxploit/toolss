<?php
include('../header.php');
?>
<title>Edit/Add News</title>
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
<h1> Edit/Add News </h1>
</div>
</div>
<hr />
<?php
$msg = $_GET['msg'];
$ininewsid = $_GET['id'];
if(!empty($ininewsid)){

	             $ceknews = mysql_query("SELECT * FROM news WHERE id='$ininewsid'");
$jumlah = mysql_num_rows($ceknews);
if($jumlah!==1){
print'<script type="text/javascript">
window.location = "/adminpanel/editnews.php?msg=ups!!.. NEWS DOES NOT EXISTS!!"
</script>';
}}
if ($msg) {
echo '<div class="alert alert-danger">
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

if(isset($_POST['editnews']) && isset($_POST['message']) && $_POST['message'] != NULL){
$datenya = gmdate("d/m/Y H:i" , time() +3600*7);
mysql_query('UPDATE `news` SET `message` = "'.mysql_real_escape_string($_POST['message']).'", `date` = "'.mysql_real_escape_string($datenya).'" WHERE `id` = "'.mysql_real_escape_string($_GET['id']).'"');
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>News HasBeen Edited!!!</div>';}
if(isset($_POST['posting']) && isset($_POST['message']) && $_POST['message'] != NULL){
$datenya = gmdate("d/m/Y H:i" , time() +3600*7);
mysql_query('INSERT INTO `news` SET `message` = "'.mysql_real_escape_string($_POST['message']).'", `date` = "'.mysql_real_escape_string($datenya).'"');
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>News HasBeen Created!!!</div>';}
if(isset($_GET['delete']) && isset($_GET['id']) && $_GET['id'] != NULL && mysql_result(mysql_query('SELECT COUNT(*) FROM `news` WHERE `id` = "'.mysql_real_escape_string($_GET['id']).'"'), 0)){
mysql_query('DELETE FROM `news` WHERE `id` = "'.mysql_real_escape_string($_GET['id']).'"');
echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>         
<b>Note: </b>News HasBeen Deleted!!!</div>';}
?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Latest News</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="40px" class="center">#</th>
<th>Content</th>
<th width="120px" class="center">Date (GMT)</th>
<th width="40px" class="center">Action</th>
</tr>
<?php
             
                    $allnews = mysql_query ("SELECT message, COUNT(message) FROM news");
                    $newsnews = mysql_fetch_array($allnews);
                    $limitnews=$newsnews['COUNT(message)'];
                    $query07 = "SELECT * FROM news ORDER BY id DESC LIMIT $limitnews";
                    $exe07 = mysql_query($query07);
                    $no07 = 1;
                    while($row07 = mysql_fetch_assoc($exe07)){
                    $idnews=$row07['id'];
                    $isipesan=$row07['message'];
                    $datenya=$row07['date'];
                        echo '<tr>';
	                echo '<td class="center">'.$no07.'</td>';
	                echo '<td class="center">'.$isipesan.'</td>';
	                echo '<td class="center">'.$datenya.'</td>';	               
	                echo '<td class="center"><a href="?id='.$idnews.'&edit" onclick="return confirm(\'Are you sure to edit?\');">Edit</a>|<a href="?id='.$idnews.'&delete" onclick="return confirm(\'Are you sure to delete?\');">Delete</a></td>';
	                echo '</tr>';
                   
                    $no07++;
                    }
?>
</tbody>
</table>
</div>
</div>
<?php if(isset($_GET['edit']) && isset($_GET['id']) && $_GET['id'] != NULL && mysql_result(mysql_query('SELECT COUNT(*) FROM `news` WHERE `id` = "'.mysql_real_escape_string($_GET['id']).'"'), 0)){ ?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Edit News</span>
</div>
<div class="panel-body">
<form action="/adminpanel/editnews.php?id=<?php echo $_GET['id'];?>" class="form-horizontal form-bordered form-validate" method="POST">
<div class="form-group input-group">
<span class="input-group-addon">Message</span>
<textarea name="message" class="form-control" placeholder="Type Your Message Here" MAXLENGHT="300"/></textarea>
</div>
<div class="form-actions">
<input type="submit" name="editnews" value="Add News" class="btn btn-danger btn-round" onclick="return confirm(\'Are you sure to edit?\');"/>
</div>
</form>
</div>
</div>
<?php }
?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Add News</span>
</div>
<div class="panel-body">
<form action="/adminpanel/editnews.php" class="form-horizontal form-bordered form-validate" method="POST">
<div class="form-group input-group">
<span class="input-group-addon">Message</span>
<textarea name="message" class="form-control" placeholder="Type Your Message Here" MAXLENGHT="300"/></textarea>
</div>
<div class="form-actions">
<input type="submit" name="posting" value="Add News" class="btn btn-danger btn-round"/>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include'../bawah.php';?>