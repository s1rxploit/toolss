<?php
include('../header.php');
?>
<title>Card Checker</title>
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
Account Checker
<span class="label label-default"><?=$acc;?></span>
</a>
</li>
<li class="panel active">
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
</li></ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> Card Checker </h1>
</div>
</div>
<hr />
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Card Checker</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="30px" class="center">#</th>
<th width="25%">Name</th>
<th>Description</th>
<th width="80px" class="center">Live</th>
<th width="80px" class="center">Die</th>
<th width="40px" class="center">Status</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td>
<a href="/ccn1">CCN Gate 1</a>
</td>
<td>
Support Visa, Amex and Master Card. Charge $1-$4. Only <font color=blue><b>Paid User</b></font> up who can use this feature.</td>
<td class="center">-2&#162;</td>
<td class="center">-0&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">2</td>
<td>
<a href="/ccn2">CCN Gate 2</a>
</td>
<td>
Support Visa, Amex and Master Card. Charge $5-$9. Only <font color=blue><b>Paid User</b></font> up who can use this feature.</td>
<td class="center">-3&#162;</td>
<td class="center">-0&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">3</td>
<td>
<a href="/ccn3">CCN Gate 3</a>
</td>
<td>
Support Visa, Amex and Master Card. Charge $20-$60. Check High Balance Card. Only <font color=blue><b>Paid User</b></font> up who can use this feature.</td>
<td class="center">-5&#162;</td>
<td class="center">-0&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">4</td>
<td>
<a href="/ccn4">CCN Gate 4</a>
</td>
<td>
Support Visa, Amex and Master Card. Charge $100-$500. Check Very High Balance Card. Only <font color=blue><b>Paid User</b></font> up who can use this feature.</td>
<td class="center">-10&#162;</td>
<td class="center">-0&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
<tr>
<td class="center">5</td>
<td>
<a href="/ccn5">CCN Gate 5</a>
</td>
<td>
Support Visa, Amex and Master Card. Charge $0.5 - $2</td>
<td class="center">-2&#162;</td>
<td class="center">-0&#162;</td>
<td class="center"><span class="icon-ok"></span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php include'../bawah.php';?>