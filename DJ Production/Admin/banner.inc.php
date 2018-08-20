<?php
    $act = $_GET['a'];
    $idbanner = $_GET['id'];
    if (isset($_POST['btnsubmit'])) {
        $idbanner = $_POST['id'];
        $judul = $conn->real_escape_string($_POST['judul']);
		$url = $conn->real_escape_string($_POST['url']);
		$kdtampil = $_POST[kdtampil];
		$urut = $_POST['urut'];
        if (!empty($judul)) {
        	$tglfile = date("dmYHis");
	        $file1 = $_POST['file1'];
	        $file1_name = $tglfile."_".$_FILES['file1']['name'];
	        $file1_tmpname = $_FILES['file1']['tmp_name'];
	        $file1_size = $_FILES['file1']['size'];
			if ($file1_size > 0) {
		        $strstatus1 = uploadfileceksize($file1_name, "../$dirupload", $file1_tmpname,$wbanner,$hbanner); 
				if (empty($strstatus1)) {
					$qadd1 = $file1_name;
					$qupd1 = ", file1='$file1_name' ";
				} else $strstatus = $strstatus1."<br>";
			}	
            if (!empty($idbanner)) {
                $q = "UPDATE tb_banner SET judul='$judul',url='$url',kdtampil='$kdtampil',urut='$urut'".$qupd1." WHERE idbanner='$idbanner'";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus .= "Data telah diupdate.";
            } else {
                $q = "INSERT INTO tb_banner(judul,url,kdtampil,urut,file1) 
                        VALUES('$judul','$url','$kdtampil','$urut','$file1_name')";
                if (!$result = $conn->query($q)) die ($conn->error);
                $strstatus .= "Banner telah ditambahkan.";
            }
        } else $strstatus = "Masukkan judul banner.";
    }
    switch($act) {
        case 'edx':
            $q = "SELECT * FROM tb_banner WHERE idbanner='$idbanner'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $r = $result->fetch_assoc();
            $judul = $r[judul];
			$url = $r[url];
			$kdtampil = $r[kdtampil];
			$urut = $r[urut];
			$file1 = $r[file1];
			if (!empty($file1)) {
				$strfile1 = "<img src=\"../$dirupload/$file1\" border=0 width=100><br>";
			} else $strfile1="";
        case 'adx':
            $sedangedit = true;
            break;
        case 'dex':
	        $q = "DELETE FROM tb_banner WHERE idbanner='$idbanner'";
	        if (!$result = $conn->query($q)) die ($conn->error);
	        $strstatus = "Data telah dihapus.";
            break;
    }
	if (!empty($strstatus)) {
?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?=$strstatus?>
</div>
<?php
	}
    if ($sedangedit) {
    	include "frmbanner.inc.php";
    } else {
?>
<h3>List Banner</h3>
<a href="main.php?m=<?=$m?>&a=adx&kd=<?=$kd?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus icon-white"></i> Banner</a>
<p></p>
<table class="table table-bordered table-condensed table-striped">
<thead>
<Tr>
	<th>Urut</th>
    <th>Judul</th>
    <th>URL</th>
    <th>Tampil</th>
	<th>Aksi</th>
</Tr>
</thead>
<tbody>
<?php
	$q = "SELECT * FROM tb_banner ORDER BY urut";
    if (!$result = $conn->query($q)) die ($conn->error);
    while ($r = $result->fetch_assoc()) {
    	if ($r[kdtampil]) {
    		$kdtampil = "Ya";
    	} else $kdtampil = "Tidak";
?>    
<tr>
	<td><?=$r[urut]?></td>
    <Td><?=$r[judul]?></Td>
    <Td><?=$r[url]?></Td>
    <td><?=$kdtampil?></td>
    <Td><a href="main.php?m=<?=$m?>&id=<?=$r[idbanner]?>&a=edx"><i class="glyphicon glyphicon-edit"></i></a>
    	<a href="main.php?m=<?=$m?>&id=<?=$r[idbanner]?>&a=dex" onclick="return confirm('Anda ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
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