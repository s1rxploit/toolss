<?php
include('../header.php');
?>
<title>Bin Checker</title>
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
</li></ul>
</div>
<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
<div class="col-lg-12">
<h1> Bin Checker </h1>
</div>
</div>
<hr />
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>Bin Checker</span>
</div>
<div class="panel-body">
<form action="/bin/" method="post" class="form-vertical">
<textarea name="bins" id="bins" class="form-control" rows="10" placeholder="4465390190980636 or 446539"></textarea>
<button type="submit" class="btn btn-primary" id="submit">Submit</button>
<button type="reset" class="btn btn-danger" id="reset">Reset</button>
</form>
</div>
</div>
<?php
$bin = $_POST['bins'];
$bins = explode("\n", $bin);
if ($bin) {
echo '
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-table"></i>
<span>BIN Checker</span>
</div>
<div class="panel-body">
<table class="table table-nomargin table-hover table-bordered">
<thead>
<tr>
<th width="100px" class="center">BIN</th>
<th class="center">BIN Infomation</th>
</tr>
</thead>
<tbody>';

for ($i = 0; $i < count($bins); $i++) {
$bins[$i] = substr($bins[$i],0,6);
$cekbin=get_headers('http://www.binlist.net/json/'.$bins[$i],1);
if($cekbin[0] == "HTTP/1.1 404 Not Found"){
$alien07bin='<font color="red">Invalid BIN!</font>';
}else{
$hasil = file_get_contents('http://www.binlist.net/json/'.$bins[$i]);
$cek = json_decode($hasil, true);
$alien07bin='<font color="#00249F"><b>'.$cek['brand'].'</b></font> - <font color="blue">'.$cek['card_type'].'</font> - '.$cek['card_category'].' - '.$cek['bank'].' - '.$cek['country_name'].'';
}
echo'
<tr>
<td class="center"><b style="color: green;">'.$bins[$i].'</b></td><td>'.$alien07bin.'</td>
</tr>
';
}
echo '
</tbody>
</table>
</div>
</div>
';
}
?>

</div>
</div>

<?php include'../bawah.php';?>