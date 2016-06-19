<?php
include('../header.php');
?>
<title>Edit User</title>
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
<h1> Edit User </h1>
</div>
</div>
<hr />
<?php
$msg = $_GET['msg'];
if ($msg) {
echo '<div class="alert alert-failed">
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


if($_GET['user']){

$ngmail=$_GET['user'];
$username = mysql_real_escape_string($ngmail);

	             $cekuser = mysql_query("SELECT * FROM user WHERE email='$ngmail'");
$jumlah = mysql_num_rows($cekuser);
if($jumlah==1){
     $query = "SELECT * FROM user WHERE email='$ngmail'";
                    $exe = mysql_query($query);
                    $no = 1;
                    while($row = mysql_fetch_assoc($exe)){
                        $ngemail = $row['email']; 
                        $creditnya = $row['credits'];    
                        $bannednya = $row['banned'];   
                        $tipenya = $row['admin'];   

                    }
                 $_SESSION['admin']=$admin;
}else{
print'<script type="text/javascript">
window.location = "/adminpanel/listuser.php?msg=ups!!.. USER DOES NOT EXISTS!!"
</script>';
}
}else{
print'<script type="text/javascript">
window.location = "/adminpanel/listuser.php?msg=ups!!.. USER IS EMPTY!!"
</script>';	
}

?>
<div class="panel panel-default">
<div class="panel-heading">
<i class="icon-user"></i>
<span>Edit User</span>
</div>
<div class="panel-body">
<form action="useredit.php?user=<?=$ngemail;?>" class="form-horizontal form-bordered form-validate" method="POST">
<div class="form-group input-group">
<span class="input-group-addon">Update Email</span>
<select name="updatemail" class="form-control">
<option value="2">Tidak</option>
<option value="1">Ya</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Email</span>
<input type="text" name="email" class="form-control" value="<?=$ngemail;?>"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Credit</span>
<input class="form-control" type="text" placeholder="<?=$creditnya; ?>" disabled="disabled"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Top Up Credit</span>
<select name="topup" class="form-control">
<option value="2">Tidak</option>
<option value="1">Ya</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon" class="form-control">Jumlah<br/><br/>Amount</span>
<input type="text" name="topcre" class="form-control" value="0"/><br/><input type="text" name="topamount" class="form-control" value="0"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Update Credit</span>
<select name="updatecre" class="form-control">
<option value="2">Tidak</option>
<option value="1">Ya</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon" class="form-control">Aksi<br/><br/>Jumlah</span>
<select name="aksi" class="form-control"><option value="1">Tambah</option><option value="2">Kurangi</option></select><br/><input type="text" name="cre" class="form-control" value="0"/>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Update Status</span>
<select name="updatestatus" class="form-control">
<option value="2">Tidak</option>
<option value="1">Ya</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Status</span>
<select name="status" class="form-control">
<?php if($bannednya==1){echo'<option value="0">UNBANNED</option>';}else{ echo'<option value="0">NORMAL</option>';}?><option value="1">BANNED</option></select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Update Tipe</span>
<select name="updatetipe" class="form-control">
<option value="2">Tidak</option>
<option value="1">Ya</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Tipe</span>
<select name="tipe" class="form-control">
<option value="0">Free User</option><option value="2">Paid User</option><option value="1">Admin</option></select>
</div>
<div class="form-actions">
<input type="submit" name="posting" value="Save changes" class="btn btn-danger btn-round"/>
</div>
</form>
</div>
</div>
</div>
</div>

<?php include'../bawah.php'; ?>