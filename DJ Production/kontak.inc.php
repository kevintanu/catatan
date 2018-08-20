<?php
    $strstatus = "";
	if (isset($_POST['btnsubmit'])) {
		$iduser = "";
		$nama = $conn->real_escape_string($_POST['nama']);
		$email = $conn->real_escape_string($_POST['email']);
		$telp = $conn->real_escape_string($_POST['telp']);
		$komentar = $conn->real_escape_string($_POST['komentar']);
		if (!empty($nama) && !empty($email) && !empty($telp) && !empty($komentar)) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$tgl = date("Y-m-d H:i:s");
				$iphost = $_SERVER['REMOTE_ADDR'];
				$q = "INSERT INTO tb_contact(iduser,tgl,iphost,nama,email,telp,komentar)
						VALUES('$iduser','$tgl','$iphost','$nama','$email','$telp','$komentar')";
				if (!$result = $conn->query($q)) die ($conn->error);
				$strstatus = "Terima kasih $nama telah menghubungi kami. Kami akan memfollow up secepatnya mengenai hal ini.";
			} else $strstatus = "Format email Anda salah.";
		} else $strstatus = "Masukkan semua field yang ada.";
	}
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    var filterx=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if(f.nama.value == "") {
        alert("Masukkan nama Anda.");
        f.nama.focus();
        return false;
    }
    if(f.telp.value == "") {
        alert("Masukkan telepon Anda.");
        f.telp.focus();
        return false;
    }
    if(f.email.value == "") {
        alert("Masukkan email Anda.");
        f.email.focus();
        return false;
    }
    if (!filterx.test(f.email.value)) {
        alert("Format email salah.");
        f.email.focus();
        return false;
    }
    if(f.komentar.value == "") {
        alert("Masukkan komentar Anda.");
        f.komentar.focus();
        return false;
    }
}
</script>
<div class="garisbawah"><span class="judulgaris">Kontak Kami</span></div>
<p></p>
<?=pstrstatus($strstatus)?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="index.php?m=<?=$m?>&id=<?=$idmember?>" method=post name=f1>
				<div class="form-group">
			    	<label for="nama" class="col-md-2 control-label">Nama</label>
			    	<div class="col-md-10">
			      		<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="telp" class="col-md-2 control-label">Telp</label>
			    	<div class="col-md-10">
			      		<input type="text" class="form-control" id="telp" name="telp" placeholder="Telepon">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="email" class="col-md-2 control-label">Email</label>
			    	<div class="col-md-10">
			      		<input type="text" class="form-control" id="email" name="email" placeholder="Email">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="komentar" class="col-md-2 control-label">Komentar</label>
			    	<div class="col-md-10">
			      		<textarea class="form-control" name="komentar"></textarea>
			    	</div>
			  	</div>
			  	<div class="form-actions">
            		<div class="col-md-10 col-md-offset-2">
                		<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
                		<button type="reset" class="btn btn-default">Reset</button>
               		</div>
            	</div>
			</form>
	</div>
</div>
