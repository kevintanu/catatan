<?php
	session_start();
	include("ceksesi.inc.php");
	require_once("../dbConnect.php");
	if (empty($_GET['p'])) {
		$p = 1;
	} else $p = $_GET['p'];
	include("header.inc.php");	
	if (!isset($_GET['m'])) { $m = ""; }
	else { $m = $_GET['m'];}
?>
<style>
#slide-menu {
	margin-left: -250px;left: 0;width: 250px;background: #222;position: fixed;height: 100%;overflow-y: auto;z-index: 1000;font-weight: 100;padding-left:5px;
	color:#ffffff;line-height:30px;
}
#slide-menu a {color:#BFBFBF}
ul.mnadm {list-style:none;padding:0px;margin-left:10px}  
ul.mnadm li a {color:#BFBFBF;}
.panel {background: none;border: none;border-radius: 0;-webkit-box-shadow:none;-box-shadow:none;}  
table th {text-align:center}
</style>
<div id="slide-menu">
	User <?=$_SESSION['isuser'];?>
	<ul class="mnadm">
		<li><a href="main.php"><i class="fa fa-home"></i> Home</a></li>	
<?php
	$q = "SELECT a.idmenu, a.nama, a.file FROM tb_menu a
			JOIN tb_menu_level b ON (a.idmenu = b.idmenu)
			WHERE b.idlevel='".$_SESSION['islevel']."'";
	if (!$result=$conn->query($q)) die ($conn->error);
	while ($r = $result->fetch_assoc()) {
?>				
		<li><a href="main.php?m=<?=$r['file']?>"><span class="glyphicon glyphicon-th-large"></span> <?=$r['nama']?></a></li>
<?php
	}
?>
		<li><a href="main.php?m=cpass"><i class="fa fa-key"></i> Ganti Password</a></li>
		<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
	</ul>
</div>
<div class="container-fluid open">
<div id="push"> <a href="#" class="btn btn-default"><i class="fa fa-bars"></i></a> </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
<?php
    //echo $m;
	switch($m) {
		case "news":
			//include("berita.inc.php");
			$strfile = "berita.inc.php";
			break;
		case "afiliasi":
			//include("afiliasi.inc.php");
			$strfile = "afiliasi.inc.php";
			break;	
		case "banner":
			//include("banner.inc.php");
			$strfile = "banner.inc.php";
			break;	
		case "slider":
			//include("slider.inc.php");
			$strfile = "slider.inc.php";
			break;	
		case "marquee":
			//include("marquee.inc.php");
			$strfile = "marquee.inc.php";
			break;		
		case "cs":
			//include("cs.inc.php");
			$strfile = "cs.inc.php";
			break;	
		case "bank":
			//include("banklist.inc.php");
			$strfile = "banklist.inc.php";
			break;	
		case "emailtpl":
			//include("emailtemplate.inc.php");
			$strfile = "emailtemplate.inc.php";
			break;	
		case "rmindepo":
			//include("rmi_transnew.inc.php");
			$strfile = "rmi_transnew.inc.php"; 
			break;	
		case "settndepo":
			//include("sett_transnew.inc.php");
			$strfile = "sett_transnew.inc.php";
			break;	
		case "settwithd":
			//include("sett_withdraw.inc.php");
			$strfile = "sett_withdraw.inc.php";
			break;
		case "setttransf":
			//include("sett_transfer.inc.php");
			$strfile = "sett_transfer.inc.php";
			break;		
		case "rmowithd":
			//include("rmo_withdraw.inc.php");
			$strfile = "rmo_withdraw.inc.php";
			break;	
		case "member":
			//include("member_list.inc.php");
			$strfile = "member_list.inc.php";
			break;	
		case "translist":
			//include("trans_list.inc.php");
			$strfile = "trans_list.inc.php";
			break;		
		case "admtranslist":
			//include("trans_list.inc.php");
			$strfile = "trans_list_adm.inc.php";
			break;	
		case "user":
			//include("user.inc.php");
			$strfile = "user.inc.php";
			break;
		case "group":
			//include("group_list.inc.php");
			$strfile = "group_list.inc.php";
			break;	
		case "mgroup":
			//include("group_menu.inc.php");
			$strfile = "group_menu.inc.php";
			break;
		case "backupdb":
			//include("group_menu.inc.php");
			$strfile = "backupdb.inc.php";
			break;		
		case "cpass":
			//include("cpass.inc.php");
			$strfile = "cpass.inc.php";
			break;
		default:
			//include("dashboard.inc.php");
			$strfile = "dashboard.inc.php";
	}	
	if (cekmenuallow($m,$_SESSION['islevel'])) {
		include $strfile;
	} else {
		echo pstrstatus("Anda tidak memiliki permisi untuk menu ini.");
	}
?>            
		</div>
	</div>
</div>
<script>
$(document).ready(function () {
	$('#push, #close').click(function () {
		var $navigacia = $('body, #slide-menu'),
		val = $navigacia.css('left') === '250px' ? '0px' : '250px';
		$navigacia.animate({
			left: val
		}, 300)
		
	});
});
</script> 
<?php	
	include("footer.inc.php");
?>