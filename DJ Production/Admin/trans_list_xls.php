<?php
	session_start();
	include("ceksesi.inc.php");
	require_once("../dbConnect.php");
	include("php-excel.class.php");
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
	
	$data = array(
        1 => array ('Tanggal', 'Jenis', 'Member', 'Produk', 'Jumlah', 'Bank', 'IP Address', 'Status')
        );
	
	$q = "SELECT a.idtrans, a.idmember, a.idafiliasi, a.amount, a.iphost, a.tgl, a.idstatus, a.idtranskode, a.namarek, a.norek,
			b.judul AS afiliasi,  c.nama, d.status, e.nama AS bank FROM tb_trans a
			JOIN tb_afiliasi b ON (a.idafiliasi = b.idafiliasi) 
			JOIN tb_member c ON (a.idmember = c.idmember)
			JOIN tb_trans_status d ON (a.idstatus = d.idstatus)
			LEFT JOIN tb_bank e ON (a.idbank = e.idbank)
			WHERE 1=1 ". $qadd. "
			ORDER BY ". $qaddorder;
    if (!$result = $conn->query($q)) die ($conn->error);
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
		$tgl = date("d/m/Y H:i", strtotime($r[tgl]));
		$idmember = $r[nama]." (".createidmember($r[idmember]).")";
		$afiliasi = $r[afiliasi];
		$jumlah = $r[amount];
		$bank = $r[bank]." ".$r[namarek]." ".$r[norek];
		$iphost = $r[iphost];
		$status = $r[status];
		$data[] = array($tgl,$strjenis,$idmember,$afiliasi,$jumlah,$bank,$iphost,$status);
	}
	//print_r($data);
	$xls = new Excel_XML('UTF-8', false, 'Transaction List '.date("d-m-Y"));
	$xls->addArray($data);
	$xls->generateXML('transaction_'.date("d-m-Y"));
?>