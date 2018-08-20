<?php
	if (!empty($_GET['sea'])) {
		$sea = $_GET['sea'];
		$qadd = " AND (a.nama LIKE '%$sea%' OR a.email LIKE '%$sea%') ";
	}
	$kd = $_GET['kd'];
	$kds = $_GET['kds'];
	switch ($kd) {
		case "1":
			$qaddorder = " a.idmember ".$kds;
			break;
		case "2":
			$qaddorder = " a.nama ".$kds;
			break;
		case "3":
			$qaddorder = " a.email ".$kds;
			break;	
		case "4":
			$qaddorder = " a.regdate ".$kds;
			break;	
		case "5":
			$qaddorder = " a.kdaktif ".$kds;
			break;	
		default:
			$qaddorder = " a.idmember ASC";
	}
	
	$q = "SELECT a.*,b.idmember AS idmemberupline,b.nama AS upline,c.nama AS bank FROM tb_member a
			LEFT JOIN tb_member b ON (a.idupline = b.idmember) 
			LEFT JOIN tb_bank c ON (a.idbank = c.idbank)
			WHERE 1=1 ". $qadd. "
			ORDER BY ". $qaddorder;
    if (!$result = $conn->query($q)) die ($conn->error);
	$banyak = $result->num_rows;
	$limit = 20;
	$banyakpage = ceil($banyak/$limit);
    $limitbawah = ($p * $limit) - $limit;
    $q .= " LIMIT $limitbawah,$limit";
	if (!$result = $conn->query($q)) die ($conn->error)
?>
<h3>List Member (<?=$banyak?> member)</h3>
<p></p>
<form class="form-inline" role="form" action="main.php" method=get name=f1>
	<input type=hidden name=m value="<?=$m?>">
	<div class="form-group">
    	<label class="sr-only" for="sea">Search</label>
    	<input type="text" class="form-control" id="sea" name="sea" value="<?=$sea?>" placeholder="Nama/Email">
  	</div>
  	<button type="submit" class="btn btn-default">Search</button> <a href="main.php?m=<?=$m?>" class="btn btn-default">Reset</a>
</form>
<p></p>
<table class="table table-bordered table-condensed table-striped table-responsive">
<thead>
	<Tr>
		<th>ID Member<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=1&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=1&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
		<th>Nama<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=2&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=2&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Email<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=3&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=3&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Telp</th>
	    <th>BBM</th>
	    <th>Bank</th>
	    <th>URL</th>
	    <th>Reg Date<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=4&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=4&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Aktif<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=5&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=5&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Upline</th>
		<!--<th>Aksi</th>-->
	</Tr>
</thead>
<tbody>
<?php
    while ($r = $result->fetch_assoc()) {
    	if ($r[kdaktif]) $straktif = "Ya";
		else $straktif = "Tidak";
		if ($r[bitly]) $strurl = "<a href=\"$r[bitly]\" target=_blank>$r[bitly]</a>";
		else $strurl = "<a href=\"$siteurl/?id=".createidmember($r[idmember])."\" target=_blank>$siteurl/?id=".createidmember($r[idmember])."</a>";
		if (!empty($r[idmemberupline])) $stridmemberupline = "<br>(".createidmember($r[idmemberupline]).")";
		else $stridmemberupline = "";
?>    
<tr>
	<Td><?=createidmember($r[idmember])?></Td>
    <Td><?=$r[nama]?></Td>
    <td><?=$r[email]?></td>
    <td><?=$r[telp1]?></td>
    <td><?=$r[bbm]?></td>
    <td><?=$r[bank]."<Br>".$r[namarek]."<br>".$r[norek]?></td>
    <td><?=$strurl?></td>
    <Td><?=date("d/m/Y", strtotime($r[regdate]))?></Td>
    <td><?=$straktif?></td>
    <td><?=$r[upline].$stridmemberupline?></td>
    <!--<Td><a href="main.php?m=<?=$m?>&id=<?=$r[idmember]?>&a=vex"><i class="glyphicon glyphicon-eye-open"></i></a></Td>-->
</tr>
<?php
	}
?>    
</tbody>
</table>
<div class="text-center">
	<ul class="pagination">
    <?php
    	for ($i=1;$i<=$banyakpage;$i++) {
        	if ($i == $p) {
            	$strclass= " class=\"active\"";
            } else $strclass="";
    ?>
    	<li<?=$strclass?>><a href="main.php?m=<?=$m?>&kd=<?=$kd?>&kds=<?=$kds?>&sea=<?=$sea?>&p=<?=$i?>"><?=$i?></a></li>
    <?php
    	}
    ?>
	</ul>
</div>