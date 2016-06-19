<?php
include('../header.php');
?>
<title>Invite Code</title>
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
<h1> Invite Code </h1>
</div>
</div>
<hr />

<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Invite Code</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="5px" class="center">#</th>
<th width="120px">Name</th>
<th width="150px" class="center">Description</th>
<th width="10px" class="center">Status</th>
</tr>
<tr>
<td class="center">1</td>
<td>
<a href="/invitepaiduser">Invite Code For Paid User</a>
</td>
<td>
If You Buy From Here It's Cheap.</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">2</td>
<td>
<a href="/inviteforpaid">Invite Code [Paid User]</a>
</td>
<td>
If You Buy From Here Are Registered By Invite Code That You Provide Will Be Paid Users.</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">3</td>
<td>
<a href="/invitefreeuser">Invite Code</a>
</td>
<td>
For All User <b>JH3</b>.</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<?php include'../bawah.php';?>