<?php
	if ($_SESSION['isuser'] == "admin") {
    $act = $_GET['a'];
    $iduser = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $iduser = $_POST['id'];
        $idlevel = $_POST['idlevel'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $passwd1 = $_POST['passwd1'];
        $passwd2 = $_POST['passwd2'];
        if (!empty($nama)) {
            if (!empty($iduser)) {
                $q = "UPDATE tb_user SET nama='$nama', email='$email', idlevel='$idlevel',lastupdate='".date("Y-m-d H:i:s")."' WHERE iduser='$iduser'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else {
                $username = str_replace(" ","",$username);
                if (strlen($username) > 4) {
                    if (!cekusername($username)) {
                        $tglnow = date("Y-m-d H:i:s");
                        $password = md5($passwd1);
                        $q = "INSERT INTO tb_user(username,passwd,nama,idlevel,email,regdate) 
                                VALUES('$username','$password','$nama','$idlevel','$email','$tglnow')";
                        if (!$result = $conn->query($q)) die ($conn->error);
                        $strstatus = "Username baru telah dibuat.";
                    } else $strstatus = "Username sudah ada, silahkan pilih username lain.";
                } else $strstatus = "Minimal karakter untuk username adalah 5.";
            }
        } else $strstatus = "Masukkan nama pengguna.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_user WHERE iduser='$iduser'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $username = $r[username];
            $nama = $r[nama];
            $idlevel = $r[idlevel];
            $email = $r[email];   
            $edituser = true; 
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
            if ($iduser > 1) {
                $q = "DELETE FROM tb_user WHERE iduser='$iduser'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah dihapus.";
            }
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
	if ($sedangedit) {
    	include "frmuser.inc.php";
    } else {
?>
<h3>List Pengguna</h3>
<a href="main.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-small"><i class="glyphicon glyphicon-plus icon-white"></i> Pengguna</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
    <Tr>
		<th>Username</th>
        <th>Nama</th>
        <th>Level</th>
        <th>Email</th>
        <th>Aksi</th>
    </Tr>
</thead>
<tbody>
<?php
		$q = "SELECT a.*,b.level FROM tb_user a JOIN tb_user_level b ON (a.idlevel = b.idlevel) ORDER BY username";
    	if (!$result = $conn->query($q)) die ($conn->error);
        while ($r = $result->fetch_assoc()) {
?>    
	<tr>
    	<Td><?=$r[username]?></Td>
        <td><?=$r[nama]?></td>
        <td><?=$r[level]?></td>
        <td><?=$r[email]?></td>
        <Td><a href="main.php?m=<?=$m?>&id=<?=$r[iduser]?>&a=edx" class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
        	<?php
            	if ($r[username] != "admin") {
            ?>
            <a href="main.php?m=<?=$m?>&id=<?=$r[iduser]?>&a=dex" class="btn btn-sm" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
            <?php
            	}
            ?>
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
<?php
	} else echo "Not Allowed!";
?>