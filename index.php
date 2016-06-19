<?php
include('header.php');
?>
<title>Dashboard</title>
<div id="left">
<ul id="menu" class="collapse">
<li class="panel active">
<a href="/">
<i class="icon-home icon-white"></i>
Dashboard</a>
</li>
<li>
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
<h1> Dashboard </h1>
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
</tr>
</thead>
<tbody>
<tr>
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
	                echo '</tr>';
                   
                    $no07++;
                    }
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<?php include'bawah.php';
 ?>