<?php
	require_once '../dbConnect.php';
	$q = "SELECT * FROM tb_email_template";
	if (!$result = $conn->query($q)) die ($conn->error);
	while ($r = $result->fetch_assoc()) {
		$str1 = str_replace("&&","||",$r[judul]);
		$str2 = str_replace("&amp;&amp;","||",$r[isi]);
		$str3 = str_replace("&&","||",$r[isitext]);
		$str4 = str_replace("&&","||",$r[strvjudul]);
		$str5 = str_replace("&&","||",$r[strvisi]);
		$qs = "UPDATE tb_email_template SET judul='$str1', isi='$str2', isitext='$str3', strvjudul='$str4', strvisi='$str5' 
				WHERE idemailtemplate='$r[idemailtemplate]'";
		if (!$results = $conn->query($qs)) die ($conn->error);
		echo $qs."<br>";
	}
?>