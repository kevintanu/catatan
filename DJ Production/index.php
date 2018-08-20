<?php
	session_start();
	require_once("dbConnect.php");
	if (!isset($_GET['id'])) {
	  $idmember ="";
	} else {
	   $idmember = $_GET['id']; // S00001
	}
	$idmember = cekidmember($idmember);
	$dtmember = getdetailsponsor($idmember);
	if (!isset($_GET['m'])) {
	   $m="home";
	} else {  
	   $m = $_GET['m'];
	}
	switch($m) {
		case "berita":
			$strtitle = "Berita";
			if (!isset($_GET['idx'])) { $id = ""; }
            else { $id = $_GET['idx']; }
			if (!empty($id)) {
				$strheader = getheaderberita($id);
				if (!empty($strheader)) {
					$strheader_description = $strheader['seodescription'];
					$strheader_keyword = $strheader['seokeyword'];
					$strheader_ogimage = $strheader['file1'];
					$strheader_subjudul = $strheader['judul'];
				}
			}
			$strbreadcrumb = "<li>Home</li><li class=\"active\">Berita</li>";
			$strfile = "berita.inc.php";
			$mx = "berita";
			$slider =false;
			break;
		case "afiliasi":
			$strtitle = "Afiliasi";
			if (!isset($_GET['idx'])) { $id = ""; }
            else { $id = $_GET['idx']; }
			if (!empty($id)) {
				$strheader = getheaderafiliasi($id);
				if (!empty($strheader)) {
					$strheader_description = $strheader['isi'];
					$strheader_ogimage = $strheader['file1'];
					$strheader_subjudul = $strheader['judul'];
				}
			}
			$strbreadcrumb = "<li>Home</li><li class=\"active\">Afiliasi</li>";
			$strfile = "afiliasi.inc.php";
			$mx = "afiliasi";
			$slider =false;
			break;
		case "kontak":
			$strbreadcrumb = "<li>Home</li><li class=\"active\">Kontak Kami</li>";
			$strfile = "kontak.inc.php";
			$mx = "kontak";
			$slider =false;
			break;
		case "konfirmasi":
		case "register":
			$strbreadcrumb = "<li>Home</li><li class=\"active\">Register</li>";
			$strfile = "register.inc.php";
			$mx = "home";
			$slider =false;
			break;
		case "forget":
			$strbreadcrumb = "<li>Home</li><li class=\"active\">Lupa Password</li>";
			$strfile = "forget.inc.php";
			$mx = "home";
			$slider =false;
			break;
		default:
			$slider = true;
			$strbreadcrumb = "<li class=\"active\">Home</li>";
			$strfile = "home.inc.php";
			$mx = $m;
			break;
	}
	include("header.inc.php");
	include("headmenu.inc.php");
	if ($slider) {
		include("slider.inc.php");
	} else {
		echo "<div style=\"margin-top:-20px;padding-top:10px;padding-bottom:10px\"></div>";
	}
?>
<div class="container" style="margin-top:10px">
	<ol class="breadcrumb">
  		<?=$strbreadcrumb?>
	</ol>
</div>
<div class="container" style="margin-top:10px">
	<div class="row">
		<div class="col-md-8">
			<?php include($strfile);?>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="garisbawah"><span class="judulgaris">Login Member</span></div>
					<br>
			    	<form role="form" name="frmlogin" method="post" action="Member/index.php?id=<?=$idmember?>">
						<div class="form-group">
					    	<label for="email">Email address</label>
					    	<input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
					  	</div>
					  	<div class="form-group">
					    	<label for="password">Password</label>
					    	<input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password">
					  	</div>
					  	<input type=submit name="btnlogin" value="Login" class="btn btn-primary">
					  	<P><br>Don't have account, <a href="index.php?m=register&id=<?=$idmember?>">Register Here</a>
					  	<br><a href="index.php?m=forget&id=<?=$idmember?>">Forget Password</a>
					</form>
			  	</div>
			</div>
			<?php
				include("banner.inc.php");
				include("cs.inc.php");
			?>
		</div>
	</div>
</div>
</div>
<div class="disclaimerblue">
<div class="container">
	<h4>Disclaimer: </h4> Kami menjamin 100% kerahasiaan dan keamanan data dari member-member kami. Dengan server berteknologi tinggi dan sistem yang lebih baik, percayakanlah hoki Anda kepada kami. Segera bergabung bersama <b><?=$webtitle?></b> dan klik register untuk mendapatkan ID yang Anda inginkan.
</div>
</div>
<div class="footerblue">
<div class="container">
	Copyright &copy; 2018 - <?=$webtitle?>
</div>
</div>
<script>
	$('.marquee').marquee({
	    duration: 10000,
	    gap: 50,
	    delayBeforeStart: 0,
	    direction: 'left'
	});
</script>
</body>
</html>