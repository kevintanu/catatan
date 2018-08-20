<?php
    $act = $_GET['a'];
    $idlevel = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $idlevel = $_POST['id'];
        $level = $conn->real_escape_string($_POST['level']);
        if (!empty($level)) {
            if (!empty($idlevel)) {
                $q = "UPDATE tb_user_level SET level='$level' WHERE idlevel='$idlevel'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else {
                $q = "INSERT INTO tb_user_level(level) 
                        VALUES('$level')";
			    if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah ditambahkan.";
            }
        } else $strstatus = "Masukkan nama group.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_user_level WHERE idlevel='$idlevel'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $level = $r[level];
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
	        $q = "DELETE FROM tb_user_level WHERE idlevel='$idlevel'";
	        if (!$result = $conn->query($q)) die ($conn->error);
	        $strstatus = "Data telah dihapus.";
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmuserlevel.inc.php");
    } else {
?>
<h3>List Group</h3>
<a href="main.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Group</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Group</th>
		<th>Aksi</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT * FROM tb_user_level";
    if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
?>    
<tr>
    <Td><?=$r[level]?></Td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idlevel]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a>
    	<a href="main.php?m=<?=$m?>&id=<?=$r[idlevel]?>&a=dex" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
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