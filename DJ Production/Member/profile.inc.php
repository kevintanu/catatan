<?php
	define('bitly_oauth_api', 'https://api-ssl.bit.ly/v3/');
	define('bitlyKey', $bitlyaccesstoken);
	function bitly_v3_shorten($longUrl, $domain = '', $x_login = '', $x_apiKey = '') {
  		$result = array();
  		$url = bitly_oauth_api . "shorten?access_token=" . bitlyKey . "&longUrl=" . urlencode($longUrl);
  		if ($domain != '') {
    		$url .= "&domain=" . $domain;
  		}
 		if ($x_login != '' && $x_apiKey != '') {
    		$url .= "&x_login=" . $x_login . "&x_apiKey=" . $x_apiKey;
  		}
  		$output = json_decode(bitly_get_curl($url));
  		if (isset($output->{'data'}->{'hash'})) {
		    $result['url'] = $output->{'data'}->{'url'};
		    $result['hash'] = $output->{'data'}->{'hash'};
		    $result['global_hash'] = $output->{'data'}->{'global_hash'};
		    $result['long_url'] = $output->{'data'}->{'long_url'};
		    $result['new_hash'] = $output->{'data'}->{'new_hash'};
  		}
  		$result['status_code'] = $output->status_code;
 		return $result;
	}
	function bitly_get_curl($uri) {
		$output = "";
	  	try {
		    $ch = curl_init($uri);
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
		    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		    $output = curl_exec($ch);
	  	} catch (Exception $e) {
  		}
  		return $output;
	}
	
	if ($mm == "bitly") {
		$url = $siteurl."/?id=".createidmember($idmember);
		$results = bitly_v3_shorten($url);
		$bitlyurl = $results[url];
		if (!empty($bitlyurl)) {
			$q = "UPDATE tb_member SET bitly='$bitlyurl' WHERE idmember='".$_SESSION['m_isiduser']."'";
			if (!$result = $conn->query($q)) die ($conn->error);
			$strstatus = "Data telah diupdate.";
		} else $strstatus = "Ada masalah pada pembuatan link pendek.";
		
	}
	if (isset($_POST['btnprofile'])) {
		$nama = $conn->real_escape_string($_POST['nama']);
		$telp1 = $conn->real_escape_string($_POST['telp1']);
		$telp2 = $conn->real_escape_string($_POST['telp2']);
		$bbm = $conn->real_escape_string($_POST['bbm']);
		$alamat = $conn->real_escape_string($_POST['alamat']);
		$idbank = $_POST['idbank'];
		$namarek = $conn->real_escape_string($_POST['namarek']);
		$norek = $conn->real_escape_string($_POST['norek']);
		if (!empty($nama) && !empty($telp1)) {
			$q = "UPDATE tb_member SET nama='$nama', telp1='$telp1', telp2='$telp2', bbm='$bbm', alamat='$alamat', idbank='$idbank', namarek='$namarek', norek='$norek' WHERE idmember='".$_SESSION['m_isiduser']."'";
			if (!$result = $conn->query($q)) die ($conn->error);
			$strstatus = "Data telah diupdate.";
		} else $strstatus = "Masukkan nama dan telp 1.";
	}
	$q = "SELECT * FROM tb_member WHERE idmember='".$_SESSION['m_isiduser']."'";
	if (!$result = $conn->query($q)) die ($conn->error);
	$r = $result->fetch_assoc();
	$email = $r[email];
	$nama = $r[nama];
	$telp1 = $r[telp1];
	$telp2 = $r[telp2];
	$bbm = $r[bbm];
	$alamat = $r[alamat];
	$idbank = $r[idbank];
	$namarek = $r[namarek];
	$norek = $r[norek];
	$idupline = $r[idupline];
	if (!empty($r[bitly])) {
		$strbitly = "<a href=\"$r[bitly]\" target=_blank>$r[bitly]</a>";
	} else {
		$strbitly = "<a href=\"member.php?m=profile&mm=bitly\">Buat Link Pendek</a>";
	}
?>
<script>
	function cekprofile() {
		var f = document.frmprofile;
		if (f.nama.value=="") {
			alert("Masukkan nama.");
			f.nama.focus();
			return false;
		}
		if (f.telp1.value=="") {
			alert("Masukkan Telepon 1.");
			f.telp1.focus();
			return false;
		}
	}
</script>
<div class="row">
    <div class="col-md-12">
    	<?=pstrstatus($strstatus)?>
		<h3>Profile</h3>
    	<form class="well well-sm form-horizontal" role="form" action="member.php?m=<?=$m?>" name="frmprofile" id="frmprofile" method="post">
    			<div class="form-group">
			    	<label for="sponsor" class="col-md-2 control-label">Sponsor</label>
			    	<div class="col-md-6">
			    		<p class="form-control-static"><?=getnamasponsor($idupline)?></p>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="email" class="col-md-2 control-label">Email</label>
			    	<div class="col-md-6">
			      		<input type="email" class="form-control" id="email" value="<?=$email?>" readonly>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="nama" class="col-md-2 control-label">Nama</label>
			    	<div class="col-md-6">
			      		<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?=$nama?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="telp1" class="col-md-2 control-label">Telp 1</label>
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" name="telp1" id="telp1" placeholder="Telp 1" value="<?=$telp1?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="telp2" class="col-md-2 control-label">Telp 2</label>
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" name="telp2" id="telp2" placeholder="Telp 2" value="<?=$telp2?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="bbm" class="col-md-2 control-label">BBM</label>
			    	<div class="col-md-2">
			      		<input type="text" class="form-control" name="bbm" id="bbm" placeholder="BBM" value="<?=$bbm?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="alamat" class="col-md-2 control-label">Alamat</label>
			    	<div class="col-md-6">
			      		<textarea class="form-control" name="alamat"><?=$alamat?></textarea>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="idbank" class="col-md-2 control-label">Nama Bank</label>
			    	<div class="col-md-6">
			      		<select name="idbank" size=1 class="form-control">
			      		<?php
			      			$q = "SELECT * FROM tb_bank ORDER BY nama";
							if (!$result = $conn->query($q)) die ($conn->error);
							while ($r = $result->fetch_assoc()) {
			      		?>	
			      			<option value="<?=$r[idbank]?>"<?php if ($r[idbank] == $idbank)  echo " selected";?>><?=$r[nama]?></option>
			      		<?php
							}
			      		?>
			      		</select>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="namarek" class="col-md-2 control-label">Pemilik Rekening</label>
			    	<div class="col-md-2">
			      		<input type="text" class="form-control" name="namarek" id="namarek" placeholder="Pemilik Rekening" value="<?=$namarek?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="norek" class="col-md-2 control-label">Nomor Rekening</label>
			    	<div class="col-md-2">
			      		<input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening" value="<?=$norek?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="bbm" class="col-md-2 control-label">Url Share</label>
			    	<div class="col-md-6">
			    		<p class="form-control-static"><a href="<?=$siteurl."/?id=".createidmember($idmember);?>" target=_blank><?=$siteurl."/?id=".createidmember($idmember);?></a> atau <?=$strbitly?></p>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<input type=submit name=btnprofile value="Submit" class="btn btn-primary" onclick="return cekprofile();">
			      		<a href="member.php" class="btn btn-default">Cancel</a>
			    	</div>
			  	</div>
			</form>
    </div>
</div>