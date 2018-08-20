<?php
	session_start();
	include("ceksesi.inc.php");
	require_once("../dbConnect.php");
	include("header.inc.php");
	$m = $_GET['m'];
	$mm = $_GET['mm'];
?>
<style>
#slide-menu {
	margin-left: -250px;left: 0;width: 250px;background: #BFBFBF;position: fixed;height: 100%;overflow-y: auto;z-index: 1000;font-weight: 100;padding-left:5px;
	color:#ffffff;line-height:30px;
}
#slide-menu a {color:#302F30}
ul.mnadm {list-style:none}  
ul.mnadm li a {color:#302F30}
.panel {background: none;border: none;border-radius: 0;-webkit-box-shadow:none;-box-shadow:none;}  
</style>
<div id="slide-menu">
	Webuser <?=$webtitle?>
	<p><a href="member.php"><i class="fa fa-home"></i> Home</a></p>
	<p><a href="member.php?m=ndepo"><i class="fa fa-stack-exchange"></i> New Deposit</a></p>
	<p><a href="member.php?m=depo"><i class="fa fa-stack-exchange"></i> Deposit</a></p>
	<p><a href="member.php?m=withd"><i class="fa fa-stack-exchange"></i> Withdraw</a></p>
	<p><a href="member.php?m=transf"><i class="fa fa-stack-exchange"></i> Transfer</a></p>
	
	<div id="accordion">
		<div class="panel">
			<h5><a data-toggle="collapse" data-parent="#accordion" href="#demo1"><i class="fa fa-users"></i> User <?=$_SESSION['isuser'];?> <b class="caret"></b></a></h5>
			<div id="demo1" class="collapse">
				<ul class="mnadm">
			        <li><a href="member.php?m=profile"><i class="fa fa-user"></i> Profile</a></li>
		            <li><a href="member.php?m=cpass"><i class="fa fa-key"></i> Ganti Password</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<p><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></p>	        	
</div>
<div class="container-fluid open">
<div id="push"> <a href="#" class="btn btn-default"><i class="fa fa-bars"></i></a> </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
<?php
	switch($m) {
		case "ndepo":
			include("trans_new.inc.php");
			break;
		case "depo":
			include("trans_deposit.inc.php");
			break;	
		case "withd":
			include("trans_withdraw.inc.php");
			break;	
		case "transf":
			include("trans_transfer.inc.php");
			break;	
		case "profile":
			include("profile.inc.php");
			break;
		case "cpass":
			include("cpass.inc.php");
			break;
		default:
			include("dashboard.inc.php");
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