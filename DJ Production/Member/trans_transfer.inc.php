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
		$account = $_POST['account'];
		$idafiliasito = $_POST['idafiliasito'];
		$accountto = $_POST['accountto'];
		$amount = $_POST['amount'];
        if (!empty($amount) && !empty($account) && !empty($accountto)) {
        	$parenttrans = cekparenttrans($idafiliasi,$idmember,$account);
			$parenttransto = cekparenttrans($idafiliasito,$idmember,$accountto);
        	if ($parenttrans && $parenttransto) {
	        	$lastupdate = date("Y-m-d H:i:s")." by ".$email;
				$iphost = $_SERVER['REMOTE_ADDR']; 
	        	$q = "INSERT INTO tb_trans(idmember,idafiliasi,parenttrans,amount,iphost,tgl,idstatus,idstatusrmi,idstatussettlement,idtranskode,lastupdate) 
	            		VALUES('$idmember','$idafiliasi','$parenttrans','$amount','$iphost','$tgl','1','1','1','4','$lastupdate')";
				if (!$result = $conn->query($q)) die ($conn->error);
				$theid = $conn->insert_id;
				$q = "INSERT INTO tb_trans_transfer(idtrans,idafiliasito,idtransto,lastupdate) 
						VALUES('$theid','$idafiliasito','$parenttransto','$lastupdate')";
				if (!$result = $conn->query($q)) die ($conn->error);
				// for email
				$e_tgl = date("d/m/Y H:i",strtotime($tgl));
				$e_produk = getnamaafiliasi($idafiliasi);
				$e_produk2 = getnamaafiliasi($idafiliasito);
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
				$qs = "SELECT * FROM tb_user WHERE idlevel='4'"; // khusus settlement
				if (!$results = $conn->query($qs)) die ($conn->error);
				while ($rs = $results->fetch_assoc()) {
					$mx++;
					if ($mx==1) {
						$mail->addAddress($rs[email], $rs[nama]);		
					} else {
						$mail->addBCC($rs[email],$rs[nama]);
					}
				}
				$mail->isHTML(true);
				$stremailsubject = getemailsubject(7,$webtitle);
				$e_body = getemailisi(7);
				$e_body_list = array("||tgl||","||produk||","||produk_tujuan||","||jumlah||","||webtitle||");
				$e_body_replace = array($e_tgl,$e_produk,$e_produk2,$e_jumlah,$webtitle);
				$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
				$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
								
				$mail->Subject = $stremailsubject;
				$mail->Body = $e_body_html;
				$mail->AltBody = $e_body_txt;
				//$mail->Subject = '[Transfer] '.$webtitle;
				//$mail->Body = "Hallo,\r\n\r\nAda transfer baru, detailnya sebagai berikut:\r\n\r\nTanggal: $e_tgl\r\nDari Produk: $e_produk\r\nKe Produk: $e_produk2\r\nJumlah: $e_jumlah\r\n\r\nBest Regards\r\n\r\nTeam $webtitle";
				$mail->send();		
	            $strstatus = "Transfer telah ditambahkan.";
			} else {
				$strstatus = "Data akun produk dari dengan produk dari atau data akun produk ke dengan produk ke yang dipilih tidak ada/statusnya belum selesai.";
				$act = "adx";
			}
        } else $strstatus = "Masukkan jumlah transfer atau account dari dan account tujuan kosong.";
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
    	include("frmtranstransfer.inc.php");
    } else {
?>
<h3>List Transfer</h3>
<a href="member.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Transfer</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal</th>
	    <th>Dari Produk</th>
	    <th>Akun Produk</th>
	    <th>Ke Produk</th>
	    <th>Akun Produk</th>
	    <th>Jumlah</th>
	    <th>Status</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT a.*,b.judul,c.status,e.account FROM tb_trans a
			LEFT JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi)
			LEFT JOIN tb_trans_status c ON (a.idstatus = c.idstatus)
			LEFT JOIN tb_trans_account e ON (a.parenttrans = e.idtrans)
			WHERE a.idmember='$idmember' AND a.idtranskode='4'
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
		$qs = "SELECT a.idafiliasito,a.idtransto,b.judul AS judulto,c.account AS accountto FROM tb_trans_transfer a 
				LEFT JOIN tb_afiliasi b ON (a.idafiliasito = b.idafiliasi)
				LEFT JOIN tb_trans_account c ON (a.idtransto = c.idtrans)
				WHERE a.idtrans='$r[idtrans]'";
				
		if (!$results = $conn->query($qs)) die ($conn->error);
		$rs = $results->fetch_assoc();
?>    
<tr<?=$strclass?>>
	<Td><?=date("d/m/Y H:i",strtotime($r[tgl]))?></Td>
    <Td><?=$r[judul]?></Td>
    <td><?=$r[account]?></td>
    <Td><?=$rs[judulto]?></Td>
    <td><?=$rs[accountto]?></td>
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
    	<li<?=$strclass?>><a href="main.php?m=<?=$m?>&kd=<?=$kd?>&sea=<?=$sea?>&p=<?=$i?>"><?=$i?></a></li>
    <?php
    	}
    ?>
	</ul>
</div>
<?php
	}
?>