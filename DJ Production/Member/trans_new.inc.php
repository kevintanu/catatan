<?php
    $act = $_GET['a'];
    $idtrans = $_GET['id'];
	if (empty($_GET['p'])) {
        $p = 1;
    } else $p = $_GET['p'];
    if (isset($_POST['btnsubmit'])) {
        $idtrans = $_POST['id'];
		$tgl = date("Y-m-d H:i:s");
		$idafiliasi = $_POST['idafiliasi'];
		$amount = $_POST['amount'];
		$idbank = $_POST['idbank'];
		$namarek = $_POST['namarek'];
		$norek = $_POST['norek'];
        if ((!empty($amount) || ($amount >= $minamount)) && !empty($namarek) && !empty($norek)) {
        	$lastupdate = date("Y-m-d H:i:s")." by ".$email;
			$iphost = $_SERVER['REMOTE_ADDR'];
        	$q = "INSERT INTO tb_trans(idmember,idafiliasi,parenttrans,amount,iphost,tgl,idbank,namarek,norek,idstatus,idstatusrmi,idstatussettlement,idtranskode,lastupdate) 
            		VALUES('$idmember','$idafiliasi','0','$amount','$iphost','$tgl','$idbank','$namarek','$norek','1','1','1','1','$lastupdate')";
			if (!$result = $conn->query($q)) die ($conn->error);
			// for email
			$e_tgl = date("d/m/Y H:i",strtotime($tgl));
			$e_produk = getnamaafiliasi($idafiliasi);
			$e_jumlah = hargaitem($amount);
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
			$qs = "SELECT * FROM tb_user WHERE idlevel='2'";
			if (!$results = $conn->query($qs)) die ($conn->error);
			while ($rs = $results->fetch_assoc()) {
				$mx++;
				if ($mx==1) {
					$mail->addAddress($rs[email], $rs[nama]);		
				} else {
					$mail->addBCC($rs[email],$rs[nama]);
				}
			}
			$stremailsubject = getemailsubject(4,$webtitle);
			$e_body = getemailisi(4);
			$e_body_list = array("||tgl||","||produk||","||jumlah||","||webtitle||");
			$e_body_replace = array($e_tgl,$e_produk,$e_jumlah,$webtitle);
			$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
			$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
							
			$mail->Subject = $stremailsubject;
			$mail->Body = $e_body_html;
			$mail->AltBody = $e_body_txt;
			
			//$mail->Subject = '[New Deposit] '.$webtitle;
			//$mail->Body = "Hallo,\r\n\r\nAda new deposit baru, detailnya sebagai berikut:\r\n\r\nTanggal: $e_tgl\r\nProduk: $e_produk\r\nJumlah: $e_jumlah\r\n\r\nBest Regards\r\n\r\nTeam $webtitle";
			$mail->send();
            $strstatus = "New Deposit telah ditambahkan.";
        } else $strstatus = "Masukkan jumlah new deposit atau jumlah new deposit kurang atau nama rekening/nomor rekening kosong.";
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
    	include("frmtransnew.inc.php");
    } else {
?>
<h3>List New Deposit</h3>
<a href="member.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> New Deposit</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal</th>
	    <th>Produk</th>
	    <th>Jumlah</th>
	    <th>Akun Produk</th>
	    <th>Bank</th>
	    <th>Status</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT a.*,b.judul,c.status,d.nama AS bank,e.account FROM tb_trans a
			LEFT JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi)
			LEFT JOIN tb_trans_status c ON (a.idstatus = c.idstatus)
			LEFT JOIN tb_bank d ON (a.idbank = d.idbank)
			LEFT JOIN tb_trans_account e ON (a.idtrans = e.idtrans)
			WHERE a.idmember='$idmember' AND a.idtranskode='1'
			ORDER BY a.idtrans DESC";
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
    <td><?=$r[account]?></td>
    <td><?=$r[bank]?></td>
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