<?php
    date_default_timezone_set('Asia/Jakarta');

    $dbhost = "localhost";
    $dbname = "djproduction";
    $dbuser = "djuser";

    $dbpass = "u53rD7Pr0duct!ON";

    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

	$kodememberdefault = "S00001";
    $webtitle = "Djudi";
    $strheader_subjudul = "Djudi";
    $siteurl = "https://www.djudi.com";
	$strheader_description = $webtitle." - Trusted Online Betting Partner.";
	$strheader_keyword = "Bola, Sepak, Liga, Pertandingan, Live, Skor, Agen, Gol, Berita";
	$strheader_ogimage = "<meta property=\"og:image\" content=\"$siteurl/img/logo.jpg\">";
    $dirupload = "fimg/";
	$dirfile = "fdoc/";

	//mail sender
	$emailfromserver = "no_reply@djudi.com";
	$emailfromservername = "Admin DJ";
	$emailfromserverpass = "C@r0K4N";
	$emailserversender = "127.0.0.1";

	$emailtocc = "captain@djudi.com";
	$emailtoccname = "Kapten Djoedi";

	//captcha
	//$publickey = "6LdK4PASAAAAALGrzkPGZuSS-mAC37y-Eczkzke5";
	//$privatekey = "6LdK4PASAAAAAF8_5pdybdeRdV09U5zCCIQkJbWQ";

	//bit.ly
	$bitlyaccesstoken = "439c334fda4b0d3a633d8e404c6eae2b38f28481";

	$minamount = 50000;
	$wslider = 1000;
	$hslider = 400;

	$wafiliasi = 192;
	$hafiliasi = 200;

	$wbanner = 300;
	$hbanner = 200;

	$wgaleri = 1000;
	$hgaleri = 1000;
	$wfoto = 500;
	$hfoto = 500;

    $script_name = $_SERVER['SCRIPT_NAME'];

    $bulanid = array('0','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

    include("function.inc.php");
?>