<?php
	require_once 'dbConnect.php';
	$urlkonfirmasi = "$siteurl/index.php?m=konfirmasi&id=$idmember&s=$sesi&i=$theid";
	echo "webtitile: $webtitle";
	$nama = "Saya";
       $sponsor="Kamu";
       $email="dodol@dodol.com";
       $passwd1="test";
       $telp1="02111212122";
        $bbm="779898989";
							$stremailsubject = getemailsubject(1,$webtitle);
							$e_body = getemailisi(1);
							$e_body_list = array("||nama||","||webtitle||","||sponsor||","||email||","||password||","||telp||","||bbm||","||urlkonfirmasi||");
							$e_body_replace = array($nama,$webtitle,$sponsor,$email,$passwd1,$telp1,$bbm,$urlkonfirmasi);
							print_r($e_body_list);
							print_r($e_body_replace);
							$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
							$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
	echo "a: $stremailsubject<P>";
	print_r($e_body);
	echo "<p>bhtml: $e_body_html";
	echo "<p>btxt: $e_body_txt";
	$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");
$newphrase = str_replace($healthy, $yummy, $phrase);
echo "xx: $newphrase";
?>