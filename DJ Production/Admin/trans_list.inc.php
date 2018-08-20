<?php
	if (!empty($_GET['sea'])) {
		$sea = $_GET['sea'];
		$qadd = " AND (c.nama LIKE '%$sea%' OR b.judul LIKE '%$sea%' OR a.iphost LIKE '%$sea%') ";
	}
	if (!empty($_GET['tgl1'])) {
		$tgl1 = $_GET['tgl1'];
		$qadd .= " AND (DATE(a.tgl) = '$tgl1') ";
		if (!empty($_GET['tgl2'])) {
			$tgl2 = $_GET['tgl2'];
			$qadd .= " AND (DATE(a.tgl) BETWEEN '$tgl1' AND '$tgl2') ";
		}
	}	
	if (!empty($_GET['ida'])) {
		$idafiliasi = $_GET['ida'];
		$qadd .= " AND a.idafiliasi='$idafiliasi' ";
	}
	if (!empty($_GET['ids'])) {
		$idstatus = $_GET['ids'];
		$qadd .= " AND a.idstatus='$idstatus' ";
	}
	$kd = $_GET['kd'];
	$kds = $_GET['kds'];
	switch ($kd) {
		case "1":
			$qaddorder = " a.tgl ".$kds;
			break;
		case "2":
			$qaddorder = " a.idtranskode ".$kds;
			break;
		case "3":
			$qaddorder = " a.idmember ".$kds;
			break;	
		case "4":
			$qaddorder = " a.idafiliasi ".$kds;
			break;	
		case "5":
			$qaddorder = " a.amount ".$kds;
			break;	
		case "6":
			$qaddorder = " a.iphost ".$kds;
			break;	
		case "7":
			$qaddorder = " a.idstatus ".$kds;
			break;	
		case "8":
			$qaddorder = " e.nama ".$kds;
			break;	
		default:
			$qaddorder = " a.tgl ASC";
	}
	
	$q = "SELECT a.idtrans, a.idmember, a.idafiliasi, a.amount, a.iphost, a.tgl, a.idstatus, a.idtranskode, a.namarek, a.norek,
			b.judul AS afiliasi,  c.nama, d.status, e.nama AS bank FROM tb_trans a
			JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi) 
			JOIN tb_member c ON (a.idmember = c.idmember)
			JOIN tb_trans_status d ON (a.idstatus = d.idstatus)
			LEFT JOIN tb_bank e ON (a.idbank = e.idbank)
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
<h3>List Transaksi</h3>
<p></p>
<a href="trans_list_xls.php?kd=<?=$kd?>&kds=<?=$kds?>&tgl1=<?=$tgl1?>&tgl2=<?=$tgl2?>&ida=<?=$ida?>&ids=<?=$ids?>&sea=<?=$sea?>"><span class="glyphicon glyphicon-arrow-down"></span> Download XLS</a>
<P></P>
<form class="form-inline" role="form" action="main.php" method=get name=f1>
	<input type=hidden name=m value="<?=$m?>">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
		    	<label class="sr-only" for="sea">Search</label>
		    	<input type="text" class="form-control" id="sea" name="sea" value="<?=$sea?>" placeholder="Member / Produk / IP">
		  	</div>		
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label class="sr-only" for="tgl1">Tgl Dari</label>
		    	<div class="input-group date" id="tgl1" data-date-format="YYYY-MM-DD">
			    	<input type="text" name="tgl1" class="form-control" value="<?=$tgl1?>" placeholder="Tgl Dari" readonly>
		    	    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		        </div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
		    	<div class="input-group date" id="tgl2" data-date-format="YYYY-MM-DD">
			    	<input type="text" name="tgl2" class="form-control" value="<?=$tgl2?>" placeholder="Tgl Sampai" readonly>
		    	    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		        </div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<select name="ida" size=1 class="form-control">
					<option value="">-- Pilih --</option>
					<?php
						$qa = "SELECT idafiliasi,judul FROM tb_afiliasi ORDER BY judul";
						if (!$resulta = $conn->query($qa)) die ($conn->error);
						while ($ra = $resulta->fetch_assoc()) {
					?>
					<option value="<?=$ra[idafiliasi]?>"<?php if ($ra[idafiliasi] == $idafiliasi) echo " selected";?>><?=$ra[judul]?></option>
					<?php		
						}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<select name="ids" size=1 class="form-control">
					<option value="">-- Pilih --</option>
					<?php
						$qa = "SELECT * FROM tb_trans_status";
						if (!$resulta = $conn->query($qa)) die ($conn->error);
						while ($ra = $resulta->fetch_assoc()) {
					?>
					<option value="<?=$ra[idstatus]?>"<?php if ($ra[idstatus] == $idstatus) echo " selected";?>><?=$ra[status]?></option>
					<?php		
						}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-default">Search</button> <a href="main.php?m=<?=$m?>" class="btn btn-default">Reset</a>
		</div>
	</div>
</form>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=1&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=1&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
		<th>Jenis<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=2&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=2&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
		<th>Member<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=3&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=3&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
		<th>Produk<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=4&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=4&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Jumlah<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=5&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=5&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Bank<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=8&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=8&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>IP Address<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=6&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=6&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	    <th>Status<br><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=7&kds=asc"><span class="glyphicon glyphicon-chevron-up"></span></a><a href="main.php?m=<?=$m?>&sea=<?=$sea?>&kd=7&kds=desc"><span class="glyphicon glyphicon-chevron-down"></span></a></th>
	</Tr>
</thead>
<tbody>
<?php
    while ($r = $result->fetch_assoc()) {
    	switch($r[idtranskode]) {
			case "1":
				$strjenis = "New Deposit";
				break;
			case "2":
				$strjenis = "Deposit";
				break;
			case "3":
				$strjenis = "Withdraw";
				break;
			case "4":
				$strjenis = "Transfer";
				break;			
    	}
?>    
<tr>
	<Td><?=date("d/m/Y H:i", strtotime($r[tgl]))?></Td>
	<td><?=$strjenis?></td>
	<Td><?=createidmember($r[idmember])."<br>".$r[nama]?></Td>
    <Td><?=$r[afiliasi]?></Td>
    <td><?=hargaitem($r[amount])?></td>
    <td><?=$r[bank]."<br>".$r[namarek]."<br>".$r[norek]?></td>
    <td><?=$r[iphost]?></td>
    <td><?=$r[status]?></td>
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
    	<li<?=$strclass?>><a href="main.php?m=<?=$m?>&kd=<?=$kd?>&kds=<?=$kds?>&tgl1=<?=$tgl1?>&tgl2=<?=$tgl2?>&ida=<?=$ida?>&ids=<?=$ids?>&sea=<?=$sea?>&p=<?=$i?>"><?=$i?></a></li>
    <?php
    	}
    ?>
	</ul>
</div>
<script type="text/javascript">
	$(function () {
    	$('#tgl1').datetimepicker({
        	pickTime: false
        });
        $('#tgl2').datetimepicker({
        	pickTime: false
        });
    });
</script>