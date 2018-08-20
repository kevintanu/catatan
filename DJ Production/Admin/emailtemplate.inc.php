<?php
    $act = $_GET['a'];
    $idemailtemplate = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $idemailtemplate = $_POST['id'];
        $judul = $conn->real_escape_string($_POST['judul']);
        $isi = $conn->real_escape_string($_POST['isi']);
		$isitext = $conn->real_escape_string($_POST['isitext']);
		$lastupdate = date("Y-m-d H:i:s")." ".$_SESSION['isuser'];
        if (!empty($judul)) {
            if (!empty($idemailtemplate)) {
                $q = "UPDATE tb_email_template SET judul='$judul',isi='$isi',isitext='$isitext',lastupdate='$lastupdate'
                		WHERE idemailtemplate='$idemailtemplate'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else $strstatus = "ID email template tidak diketemukan.";
        } else $strstatus = "Masukkan judul email.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_email_template WHERE idemailtemplate='$idemailtemplate'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
			$emailuntuk = $r[emailuntuk];
            $judul = $r[judul];
			$isi = $r[isi];
			$isitext = $r[isitext];
			$strvjudul = $r[strvjudul];
			$strvisi = $r[strvisi];
			$lastupdate = $r[lastupdate];
            $sedangedit = true;
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmemailtemplate.inc.php");
    } else {
?>
<h3>List Email Template</h3>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Jenis Email</th>
	    <th>Judul</th>
	    <th>Last Update</th>
		<th>Aksi</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT idemailtemplate,emailuntuk,judul,lastupdate FROM tb_email_template ORDER BY idemailtemplate";
    if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
?>    
<tr>
	<Td><?=$r[emailuntuk]?></Td>
    <Td><?=$r[judul]?></Td>
    <td><?=$r[lastupdate]?></td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idemailtemplate]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a></Td>
</tr>
<?php
	}
?>    
</tbody>
</table>
<?php
	}
?>