<?php
    $act = $_GET['a'];
    $idcs = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $idcs = $_POST['id'];
        $nama = $conn->real_escape_string($_POST['nama']);
        $yahoo = $conn->real_escape_string($_POST['yahoo']);
        if (!empty($nama)) {
            if (!empty($idcs)) {
                $q = "UPDATE tb_cs SET nama='$nama',yahoo='$yahoo' WHERE idcs='$idcs'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else {
                $q = "INSERT INTO tb_cs(nama,yahoo) 
                        VALUES('$nama','$yahoo')";
			    if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah ditambahkan.";
            }
        } else $strstatus = "Masukkan nama.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_cs WHERE idcs='$idcs'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $nama = $r[nama];
			$yahoo = $r[yahoo];
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
	        $q = "DELETE FROM tb_cs WHERE idcs='$idcs'";
	        if (!$result = $conn->query($q)) die ($conn->error);
	        $strstatus = "Data telah dihapus.";
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmcs.inc.php");
    } else {
?>
<h3>List Customer Support</h3>
<a href="main.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Customer Support</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Nama</th>
	    <th>Yahoo</th>
		<th>Aksi</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT idcs,nama,yahoo FROM tb_cs ORDER BY nama DESC";
    if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
?>    
<tr>
    <Td><?=$r[nama]?></Td>
    <td><?=$r[yahoo]?></td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idcs]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a>
    	<a href="main.php?m=<?=$m?>&id=<?=$r[idcs]?>&a=dex" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
    </Td>
</tr>
<?php
	}
?>    
</tbody>
</table>
<?php
	}
?>