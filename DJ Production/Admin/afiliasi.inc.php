<?php
    if (!isset($_GET['a'])) { $act = ""; } else { $act = $_GET['a']; }
	if (!isset($_GET['kd'])) { $kd = ""; } else { $kd = $_GET['kd']; }
    if (!isset($_GET['id'])) { $idafiliasi = ""; } else { $idafiliasi = $_GET['id']; }
	if (empty($_GET['p'])) {
        $p = 1;
    } else $p = $_GET['p'];
    if (isset($_POST['btnsubmit'])) {
        $idafiliasi = $_POST['id'];
		$tgl = date("Y-m-d H:i:s");
        $judul = $conn->real_escape_string($_POST['judul']);
        $isi = $conn->real_escape_string($_POST['isi']);
		$kdtampil = $_POST['kdtampil'];
		$lastupdate = date("Y-m-d H:i:s")." ".$_SESSION['isuser'];
        if (!empty($judul)) {
        	$file1_size = $_FILES['file1']['size'];
			$tglfile = date("dmYHis");
        	if ($file1_size > 0) {	
	        	$file1 = $_POST['file1'];
	        	$file1_name = $tglfile."_".$_FILES['file1']['name'];
	        	$file1_tmpname = $_FILES['file1']['tmp_name'];
		        $strstatus1 = uploadfileceksizeplus($file1_name, "../$dirupload", $file1_tmpname,$wgaleri,$hgaleri); 
				if (empty($strstatus1)) {
					$qadd1 = $file1_name;
					$qupd1 = ", file1='$file1_name' ";
					require_once('php_image_magician.php');
					$magicianObj = new imageLib("../$dirupload/".$file1_name);
					$magicianObj -> resizeImage($wafiliasi, $hafiliasi, 'crop');
					$magicianObj -> saveImage("../$dirupload/s/".$file1_name, 90);
				} else $strstatus = $strstatus1."<br>";
			}	
            if (!empty($idafiliasi)) {
                $q = "UPDATE tb_afiliasi SET judul='$judul',isi='$isi',kdtampil='$kdtampil',
                		lastupdate='$lastupdate'".$qupd1." WHERE idafiliasi='$idafiliasi'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah diupdate.";
            } else {
                $q = "INSERT INTO tb_afiliasi(tgl,judul,isi,kdtampil,file1,lastupdate) 
                        VALUES('$tgl','$judul','$isi','$kdtampil','$file1_name','$lastupdate')";
			    if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus = "Data telah ditambahkan.";
            }
        } else $strstatus = "Masukkan nama afiliasi.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_afiliasi WHERE idafiliasi='$idafiliasi'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $judul = $r[judul];
			$isi = $r[isi];
			$kdtampil = $r[kdtampil];
			$file1 = $r[file1];
			$lastupdate = $r[lastupdate];
			if (!empty($file1)) {
				$strfile1 = "<img src=\"../$dirupload/$file1\" border=0 width=100><br>";
			} else $strfile1="";
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
	        $q = "DELETE FROM tb_afiliasi WHERE idafiliasi='$idafiliasi'";
	        if (!$result = $conn->query($q)) die ($conn->error);
	        $strstatus = "Data telah dihapus.";
            break;
    }
?>
<?=pstrstatus($strstatus)?>
<?php
    if ($sedangedit) {
    	include("frmafiliasi.inc.php");
    } else {
?>
<h3>List Afiliasi</h3>
<a href="main.php?m=<?=$m?>&a=adx" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Afiliasi</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Tanggal</th>
	    <th>Judul</th>
	    <th>Tampil</th>
	    <th>Last Update</th>
		<th>Aksi</th>
	</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT idafiliasi,tgl,judul,kdtampil,lastupdate FROM tb_afiliasi ORDER BY idafiliasi DESC";
    if (!$result = $conn->query($q)) die ($conn->error);
	$banyak = $result->num_rows;
	$limit = 20;
	$banyakpage = ceil($banyak/$limit);
    $limitbawah = ($p * $limit) - $limit;
    $q .= " LIMIT $limitbawah,$limit";
	if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
    	if ($r[kdtampil]) {
    		$kdtampil = "Ya";
    	} else $kdtampil = "Tidak";
?>    
<tr>
	<Td><?=date("d/m/Y",strtotime($r[tgl]))?></Td>
    <Td><?=$r[judul]?></Td>
    <td><?=$kdtampil?></td>
    <td><?=$r[lastupdate]?></td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idafiliasi]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a>
    	<a href="main.php?m=<?=$m?>&id=<?=$r[idafiliasi]?>&a=dex" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
    </Td>
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