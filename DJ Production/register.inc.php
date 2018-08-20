<?php
	include("simple-php-captcha.php");
	$okregister = true;
	$strstatus = "";
	$email = "";
    $nama = "";
    $telp1 = "";
    $bbm = "";
    $namarek = "";
    $norek = "";
    $idbank = "";
	if ($m == "konfirmasi") {
		$idmemberdaftar = $_GET['i'];
		$cpsesi = $_GET['s'];
		if (!empty($idmemberdaftar) && !empty($cpsesi)) {
			$q = "SELECT idmember FROM tb_member WHERE idmember='$idmemberdaftar' AND cpsesi='$cpsesi'";
			if (!$result = $conn->query($q)) die ($conn->error);
			if ($result->num_rows) {
				$qs = "UPDATE tb_member SET kdaktif='1', cpsesi=NULL WHERE idmember='$idmemberdaftar'";
				if (!$results = $conn->query($qs)) die ($conn->error);
				$strstatus = "Terima kasih, user Anda telah diaktifkan. Selamat bergabung di $webtitle. Silahkan gunakan fitur-fitur yang ada pada website ini.";
			} else $strstatus = "Data member tidak valid.";
		}
		$okregister = false;
	}
	if (isset($_POST['btnregister'])) {
		$email = $conn->real_escape_string($_POST['email']);
		$passwd1 = $_POST['passwd1'];
		$passwd2 = $_POST['passwd2'];
		$nama = $conn->real_escape_string($_POST['nama']);
		$telp1= $conn->real_escape_string($_POST['telp1']);
		$bbm = $conn->real_escape_string($_POST['bbm']);
		$idbank = $_POST['idbank'];
		$namarek = $conn->real_escape_string($_POST['namarek']);
		$norek = $conn->real_escape_string($_POST['norek']);	
		$captcha = $conn->real_escape_string($_POST['captcha']);		
		if (strtolower($_SESSION['captcha']['code']) == strtolower($captcha)) {
			if (!empty($email) && !empty($passwd1) && !empty($passwd2) && !empty($nama) && !empty($telp1) && !empty($namarek) && !empty($norek)) {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
					if ($passwd1 == $passwd2) {
						if (!cekmember($email)) {
							$md5_passwd = md5($passwd1);
							$sesi = session_id();
							$regdate=date("Y-m-d H:i:s");
							$q = "INSERT INTO tb_member(regdate,email,passwd,nama,telp1,bbm,idbank,namarek,norek,kdaktif,cpsesi,idupline) 
									VALUES('$regdate','$email','$md5_passwd','$nama','$telp1','$bbm','$idbank','$namarek','$norek','0','$sesi','".getidmember($idmember)."')";
							if (!$result=$conn->query($q)) die($conn->error);
							$sponsor = getnamasponsor($idmember);
							$theid = $conn->insert_id;
							include("PHPMailerAutoload.php");
							$mail = new PHPMailer();

							$mail->isSMTP();
							//$mail->SMTPSecure = "ssl";
                                                 //$mail->SMTPDebug = 2;
							$mail->Host = $emailserversender;
							$mail->Port = 25;                                                 
							$mail->Helo = "localhost";
							//$mail->SMTPAuth = true;
							$mail->Username = $emailfromserver;
							$mail->Password = $emailfromserverpass;
							$mail->setFrom($emailfromserver, $emailfromservername);
							$mail->addReplyTo($emailfromserver, $emailfromservername);
							$mail->addAddress($email, $nama);
							$urlkonfirmasi = "$siteurl/index.php?m=konfirmasi&id=$idmember&s=$sesi&i=$theid";
							$stremailsubject = getemailsubject(1,$webtitle);
							$e_body = getemailisi(1);
							$e_body_list = array("||nama||","||webtitle||","||sponsor||","||email||","||password||","||telp||","||bbm||","||urlkonfirmasi||");
							$e_body_replace = array($nama,$webtitle,$sponsor,$email,$passwd1,$telp1,$bbm,$urlkonfirmasi);
							$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
							$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[text]);
							$mail->isHTML(true); 
							$mail->Subject = $stremailsubject;
							$mail->Body = $e_body_html;
							$mail->AltBody = $e_body_txt;
							/*
							$mail->Body = "Hallo $nama,\r\n\r\nAnda telah melakukan pendaftaran di website kami $webtitle, detailnya sebagai berikut:\r\n\r\n
											Sponsor: $sponsor\r\nEmail: $email\r\nPassword: $passwd1\r\nNama: $nama\r\nTelp 1: $telp1\r\nBBM: $bbm\r\n\r\n
											Untuk mengaktifkan user Anda diwebsite kami silahkan klik link berikut untuk konfirmasi $siteurl/index.php?m=konfirmasi&id=$idmember&s=$sesi&i=$theid\r\n\r\n
											Best Regards\r\n\r\nTeam $webtitle";
							 *
							 */
							//$mail->send();
							if(!$mail->send()) {
							   echo 'Message could not be sent. ';
							   echo 'Mailer Error: ' . $mail->ErrorInfo;
							   exit;
							}
							$mail2 = new PHPMailer();
							$mail2->isSMTP();
							//$mail2->SMTPSecure = "tls";
                                                 //$mail2->SMTPDebug = 2;
							$mail2->Host = $emailserversender;
							$mail2->Port = 25;
							//$mail2->SMTPAuth = true;
                                                 $mail->Helo = "localhost";
							$mail2->Username = $emailfromserver;
							$mail2->Password = $emailfromserverpass;
							$mail2->setFrom($emailfromserver, $emailfromservername);
							$mail2->addReplyTo($emailfromserver, $emailfromservername);
							$mail2->addAddress($dtmember[email], $dtmember[nama]);
							$mail2->isHTML(true);
							
							$stremailsubject = getemailsubject(2,$webtitle);
							$e_body = getemailisi(2);
							$e_body_list = array("||namaupline||","||webtitle||","||email||","||nama||","||telp||","||bbm||");
							$e_body_replace = array($dtmember[nama],$webtitle,$email,$nama,$telp1,$bbm);
							$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
							$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
							 
							$mail2->Subject = $stremailsubject;
							$mail2->Body = $e_body_html;
							$mail2->AltBody = $e_body_txt;
							/*
							$mail2->Body = "Hallo $dtmember[nama],\r\n\r\nAda yang telah melakukan pendaftaran di website $webtitle sebagai downline Anda, 
											detailnya sebagai berikut:\r\n\r\nSponsor: $sponsor\r\nEmail: $email\r\nNama: $nama\r\nTelp 1: $telp1\r\nBBM: $bbm\r\n\r\n
											Best Regards\r\n\r\nTeam $webtitle";
							 * 
							 */
							//$mail2->send();
							if(!$mail2->send()) {
							   echo 'Message could not be sent. ';
							   echo 'Mailer Error: ' . $mail2->ErrorInfo;
							   exit;
							}
							
							$strstatus = "<strong>Register:</strong> Terima kasih $nama, kami telah mengirimkan email untuk verifikasi pendaftaran ini.";
							unset($email);unset($nama);unset($telp1);unset($bbm);unset($idbank);unset($namarek);unset($norek);
						} else $strstatus = "<strong>Register:</strong> Email Anda sudah terdaftar, mohon gunakan email lainnya."; 
					} else $strstatus = "<strong>Register:</strong> Kedua password Anda tidak sama.";
				} else $strstatus = "<strong>Register:</strong> Format email Anda salah.";
			} else $strstatus = "<strong>Register: Masukkan semua field yang ada.";
		} else $strstatus = "<strong>Register:</strong> Data captcha yang Anda masukkan salah.";
	}
	$_SESSION['captcha'] = simple_php_captcha();
?>
<script>
	function cekregister() {
		var f = document.f1;
		var filterx=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		
		if (f.email.value=="") {
			alert("Masukkan email.");
			f.email.focus();
			return false;
		}
		if (!filterx.test(f.email.value)) {
	        alert("Format email salah.");
	        f.email.focus();
	        return false;
	    }
		if (f.passwd1.value=="") {
			alert("Masukkan password.");
			f.passwd1.focus();
			return false;
		}
		if (f.passwd2.value=="") {
			alert("Masukkan konfirmasi password.");
			f.passwd2.focus();
			return false;
		}
		if (f.passwd1.value != f.passwd2.value) {
			alert("Kedua password Anda tidak sama.");
			f.passwd2.focus();
			return false;
		}
		if (f.nama.value=="") {
			alert("Masukkan nama.");
			f.nama.focus();
			return false;
		}
		if (f.telp1.value=="") {
			alert("Masukkan nomor HP.");
			f.telp1.focus();
			return false;
		}
		if (f.namarek.value=="") {
			alert("Masukkan pemilik rekening.");
			f.namarek.focus();
			return false;
		}
		if (f.norek.value=="") {
			alert("Masukkan nomor rekening.");
			f.norek.focus();
			return false;
		}
	}
</script>
<div class="garisbawah"><span class="judulgaris">Register</span></div>
<br>
<div class="row">
	<div class="col-md-12">
			<?=pstrstatus($strstatus)?>
<?php    
	if ($okregister) {
?>	
			<form class="form-horizontal" role="form" action="index.php?m=register&id=<?=$idmember?>" name="f1" method="post">
				<div class="form-group">
			    	<label for="email" class="col-md-3 control-label">Sponsor</label>
			    	<div class="col-md-6">
			    		<p class="form-control-static"><?=$dtmember['nama']?> (<?=$idmember?>)</p>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="email" class="col-md-3 control-label">Email</label>
			    	<div class="col-md-6">
			      		<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$email?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="passwd1" class="col-md-3 control-label">Password</label>
			    	<div class="col-md-5">
			      		<input type="password" class="form-control" name="passwd1" id="passwd1" placeholder="Password" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="passwd2" class="col-md-3 control-label">Konfirmasi Password</label>
			    	<div class="col-md-5">
			      		<input type="password" class="form-control" name="passwd2" id="passwd2" placeholder="Konfirmasi Password" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="nama" class="col-md-3 control-label">Nama</label>
			    	<div class="col-md-8">
			      		<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?=$nama?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="telp1" class="col-md-3 control-label">Nomor HP</label>
			    	<div class="col-md-8">
			      		<input type="text" class="form-control" name="telp1" id="telp1" placeholder="Telp 1" value="<?=$telp1?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="bbm" class="col-md-3 control-label">BBM</label>
			    	<div class="col-md-8">
			      		<input type="text" class="form-control" name="bbm" id="bbm" placeholder="BBM" value="<?=$bbm?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="idbank" class="col-md-3 control-label">Nama Bank</label>
			    	<div class="col-md-6">
			      		<select name="idbank" size=1 class="form-control">
			      		<?php
			      			$q = "SELECT * FROM tb_bank ORDER BY nama";
							if (!$result = $conn->query($q)) die ($conn->error);
							while ($r = $result->fetch_assoc()) {
			      		?>	
			      			<option value="<?=$r['idbank']?>"<?php if ($r['idbank'] == $idbank)  echo " selected";?>><?=$r['nama']?></option>
			      		<?php
							}
			      		?>
			      		</select>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="namarek" class="col-md-3 control-label">Pemilik Rekening</label>
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" name="namarek" id="namarek" placeholder="Pemilik Rekening" value="<?=$namarek?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="norek" class="col-md-3 control-label">Nomor Rekening</label>
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening" value="<?=$norek?>">
			    	</div>
			  	</div>
			  	<div class="form-group">
				    <label for="captcha" class="col-md-3 control-label">Captcha</label>
				    <div class="col-md-4">
				      	<img src="<?=$_SESSION['captcha']['image_src']?>">
				      	<br><input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha">
				    </div>
				</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-3 col-sm-10">
			      		<input type=submit name="btnregister" value="Submit" class="btn btn-primary" onclick="return cekregister();">
			    	</div>
			  	</div>
			</form>
<?php
	}
?>
	</div>
</div>