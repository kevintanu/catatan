<?php
    $act = $_GET['a'];
    $idtrans = $_GET['id'];
	if (empty($_GET['p'])) {
        $p = 1;
    } else $p = $_GET['p'];
    if (isset($_POST['btnsubmit'])) {
        $idtrans = $_POST['id'];
		$idstatusadmin = $_POST['idstatusadmin'];
        if (!empty($idstatusadmin)) {
        	$lastupdate = date("Y-m-d H:i:s")." by ".$isuser;
			switch($idstatusadmin) {
				case "2":
					$qadd = " idstatus='2', idstatusrmi='2' ";
					$okemail = true;
					break;
				case "1":
					$qadd = " idstatus='1', idstatusrmi='1' ";	
					break;
			}
        	$q = "UPDATE tb_trans SET ".$qadd.", lastupdate='$lastupdate' WHERE idtrans='$idtrans'";
			if (!$result = $conn->query($q)) die ($conn->error);
			if ($okemail) {
				// for email
				$qs = "SELECT a.idmember,a.tgl,a.amount,a.idafiliasi,b.email,b.nama FROM tb_trans a
						JOIN tb_member b ON (a.idmember = b.idmember)
						WHERE a.idtrans='$idtrans'";
				if (!$results = $conn->query($qs)) die ($conn->error);
				$rs = $results->fetch_assoc();
				$e_tgl = date("d/m/Y H:i",strtotime($rs[tgl]));
				$e_produk = getnamaafiliasi($rs[idafiliasi]);
				$e_jumlah = hargaitem($rs[amount]);
				include("../PHPMailerAutoload.php");
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host = $emailserversender;
				$mail->Port = 25;
				$mail->Helo = 'localhost';
				$mail->Username = $emailfromserver;
				$mail->Password = $emailfromserverpass;
				$mail->setFrom($emailfromserver, $emailfromservername);
				$mail->addReplyTo($emailfromserver, $emailfromservername);
				$mail->addAddress($rs[email], $rs[nama]);
				$mail->isHTML(true);
				$stremailsubject = getemailsubject(11,$webtitle);
				$e_body = getemailisi(11);
				$e_body_list = array("||namamember||","||tgl||","||produk||","||jumlah||","||webtitle||");
				$e_body_replace = array($rs[nama],$e_tgl,$e_produk,$e_jumlah,$webtitle);
				$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
				$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
								
				$mail->Subject = $stremailsubject;
				$mail->Body = $e_body_html;
				$mail->AltBody = $e_body_txt;	
				//$mail->Subject = '[Withdraw] '.$webtitle;
				//$mail->Body = "Hallo $rs[nama],\r\n\r\nWithdraw baru Anda telah selesai diproses, detailnya sebagai berikut:\r\n\r\nTanggal: $e_tgl\r\nProduk: $e_produk\r\nJumlah: $e_jumlah\r\n\r\nBest Regards\r\n\r\nTeam $webtitle";
				$mail->send();
			}
            $strstatus = "Data telah diubah.";
        } else $strstatus = "Pilih status untuk transaksi ini.";
    }
    switch($act) {
        case 'edx':
			$q = "SELECT a.*,b.judul,d.nama AS bank FROM tb_trans a
					LEFT JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi)
					LEFT JOIN tb_bank d ON (a.idbank = d.idbank)
					WHERE a.idtranskode='3' AND a.idtrans='$idtrans'
					ORDER BY a.idtrans DESC";
			if (!$result=$conn->query($q)) die ($conn->error);
			if ($result->num_rows) {
				$r = $result->fetch_assoc();
				$tgl = date("d/m/Y H:i", strtotime($r[tgl]));
				$afiliasi = $r[judul];
				$jumlah = hargaitem($r[amount]);
				$bank = $r[bank];
				$namarek = $r[namarek];
				$norek = $r[norek];
				$idstatusadmin = $r[idstatusrmi];
	            $sedangedit = true;
	        } else {
	        	$strstatus = "Data tidak diketemukan.";
	        }
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmrmowithdraw.inc.php");
    } else {
?>
<h3>List Withdraw</h3>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal</th>
	    <th>Produk</th>
	    <th>Jumlah</th>
	    <th>Bank</th>
	    <th>Rekening</th>
	    <th>Pemilik</th>
	    <th>Status</th>
	    <th>Action</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT a.*,b.judul,c.statusadmin,d.nama AS bank FROM tb_trans a
			LEFT JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi)
			LEFT JOIN tb_trans_status_admin c ON (a.idstatusrmi = c.idstatusadmin)
			LEFT JOIN tb_bank d ON (a.idbank = d.idbank)
			WHERE a.idtranskode='3' AND a.idstatussettlement='2'
			ORDER BY a.idtrans DESC";
    if (!$result = $conn->query($q)) die ($conn->error);
	$banyak = $result->num_rows;
	$limit = 20;
	$banyakpage = ceil($banyak/$limit);
    $limitbawah = ($p * $limit) - $limit;
    $q .= " LIMIT $limitbawah,$limit";
	if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
?>    
<tr<?=$strclass?>>
	<Td><?=date("d/m/Y H:i",strtotime($r[tgl]))?></Td>
    <Td><?=$r[judul]?></Td>
    <td><?=hargaitem($r[amount])?></td>
    <td><?=$r[bank]?></td>
    <td><?=$r[norek]?></td>
    <td><?=$r[namarek]?></td>
    <td><?=$r[statusadmin]?></td>
    <td><a href="main.php?m=<?=$m?>&a=edx&id=<?=$r[idtrans]?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
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
    	<li<?=$strclass?>><a href="main.php?m=<?=$m?>&kd=<?=$kd?>&sea=<?=$sea?>&p=<?=$i?>"><?=$i?></a></li>
    <?php
    	}
    ?>
	</ul>
</div>
<?php
	}
?>