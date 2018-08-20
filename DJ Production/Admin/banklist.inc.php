<?php
    $act = $_GET['a'];
    $idbank = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $idbank = $_POST['id'];
        $nama = $conn->real_escape_string($_POST['nama']);
        if (!empty($nama)) {
            if (!empty($idbank)) {
                $q = "UPDATE tb_bank SET nama='$nama' WHERE idbank='$idbank'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else {
                $q = "INSERT INTO tb_bank(nama) 
                        VALUES('$nama')";
			    if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah ditambahkan.";
            }
        } else $strstatus = "Masukkan nama bank.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_bank WHERE idbank='$idbank'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $nama = $r[nama];
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
	        $q = "DELETE FROM tb_bank WHERE idbank='$idbank'";
	        if (!$result = $conn->query($q)) die ($conn->error);
	        $strstatus = "Data telah dihapus.";
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmbank.inc.php");
    } else {
?>
<h3>List Customer Support</h3>
<a href="main.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Bank</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Nama</th>
		<th>Aksi</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT * FROM tb_bank ORDER BY nama";
    if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
?>    
<tr>
    <Td><?=$r[nama]?></Td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idbank]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a>
    	<a href="main.php?m=<?=$m?>&id=<?=$r[idbank]?>&a=dex" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
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