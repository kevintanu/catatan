<?php
	$q = "SELECT * FROM tb_banner WHERE kdtampil='1' ORDER BY urut LIMIT 3";
	if (!$result=$conn->query($q)) die ($conn->error);
	while ($r = $result->fetch_assoc()) {
?>
<a href="<?=$r['url']?>"><img src="<?=$dirupload.$r['file1']?>" title="<?=$r['judul']?>"></a><Br>
<?php
	}
?>