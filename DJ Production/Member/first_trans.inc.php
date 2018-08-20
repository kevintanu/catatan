<?php
    $act = $_GET['a'];
    $idtransfirst = $_GET['id'];
	if (empty($_GET['p'])) {
        $p = 1;
    } else $p = $_GET['p'];
    if (isset($_POST['btnsubmit'])) {
        $idtransfirst = $_POST['id'];
		$tgl = date("Y-m-d H:i:s");
		$idafiliasi = $_POST['idafiliasi'];
		$amount = $_POST['amount'];
        if (!empty($amount) || ($amount >= $minamount)) {
        	$q = "INSERT INTO tb_trans_first(idmember,tgl,idafiliasi,amount,idstatus) 
            		VALUES('$idmember','$tgl','$idafiliasi','$amount','1')";
			if (!$result = $conn->query($q)) die ($conn->error);
            $strstatus = "Deposit telah ditambahkan.";
        } else $strstatus = "Masukkan nilai deposit.";
    }
    switch($act) {
        case 'adx':
            $sedangedit = true;
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmfirsttrans.inc.php");
    } else {
?>
<h3>List First time Deposit</h3>
<a href="member.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> First time Deposit</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal</th>
	    <th>Afiliasi</th>
	    <th>Deposit</th>
	    <th>Status</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT a.*,b.judul,c.status FROM tb_trans_first a
			LEFT JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi)
			LEFT JOIN tb_status c ON (a.idstatus = c.idstatus)
			WHERE a.idmember='$idmember'
			ORDER BY idtransfirst DESC";
    if (!$result = $conn->query($q)) die ($conn->error);
	$banyak = $result->num_rows;
	$limit = 20;
	$banyakpage = ceil($banyak/$limit);
    $limitbawah = ($p * $limit) - $limit;
    $q .= " LIMIT $limitbawah,$limit";
	if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
    	if ($r[idstatus]==3) $strclass=" class=\"danger\"";
		else $strclass="";
?>    
<tr<?=$strclass?>>
	<Td><?=date("d/m/Y H:i",strtotime($r[tgl]))?></Td>
    <Td><?=$r[judul]?></Td>
    <td><?=hargaitem($r[amount])?></td>
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
    	<li<?=$strclass?>><a href="member.php?m=<?=$m?>&kd=<?=$kd?>&sea=<?=$sea?>&p=<?=$i?>"><?=$i?></a></li>
    <?php
    	}
    ?>
	</ul>
</div>
<?php
	}
?>