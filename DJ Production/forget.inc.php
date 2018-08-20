<?php
    $strstatus ="";
    $email = "";
	if (isset($_POST['btnforget'])) {
		$email = $_POST['email'];
		if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$q = "SELECT idmember,email,nama FROM tb_member WHERE email='$email' AND kdaktif='1'";
			if (!$result=$conn->query($q)) die ($conn->error);
			if ($result->num_rows) {
				$r = $result->fetch_assoc();
				$newpass = randomPassword();
				$md5_newpass = md5($newpass);
				$kdforget = session_id();
				$qs = "UPDATE tb_member SET cppasswd='$md5_newpass', cpsesi='$kdforget' WHERE idmember='$r[idmember]'";
				if (!$results=$conn->query($qs)) die ($conn->error);
				include("PHPMailerAutoload.php");
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host = $emailserversender;
				$mail->Port = 25;
				$mail->SMTPAuth = true;
				$mail->Username = $emailfromserver;
				$mail->Password = $emailfromserverpass;
				$mail->setFrom($emailfromserver, $emailfromservername);
				$mail->addReplyTo($emailfromserver, $emailfromservername);
				$mail->addAddress($r['email'], $r['nama']);
				$mail->isHTML(true);
				$linkkonfirmasi = "$siteurl/index.php?m=forget&id=$idmember&s=$kdforget&i=$r[idmember]";
				$stremailsubject = getemailsubject(3,$webtitle);
				$e_body = getemailisi(3);
				$e_body_list = array("||nama||","||email||","||newpassword||","||linkkonfirmasi||","||webtitle||");
				$e_body_replace = array($r['nama'],$r['email'],$newpass,$linkkonfirmasi,$webtitle);
				$e_body_html = str_replace($e_body_list,$e_body_replace,$e_body[isi]);
				$e_body_txt = str_replace($e_body_list,$e_body_replace,$e_body[isitext]);
							
				$mail->Subject = $stremailsubject;
				$mail->Body = $e_body_html;
				$mail->AltBody = $e_body_txt;
				
				/*$mail->Body = "Hallo $r[nama],\r\n\r\nAnda telah melakukan request forget password, berikut detailnya:\r\n\r\nUsername: $email\r\nNew Password: $newpass\r\n\r\nKlik link berikut atau copy paste ke browser Anda untuk mengaktifkan password baru Anda: $siteurl/index.php?m=forget&id=$idmember&s=$kdforget&i=$r[idmember] \r\n\r\nBest Regards\r\n\r\nTeam $webtitle";
				 * 
				 */
				$mail->send();
				/*
				if(!$mail->send()) {
							   echo 'Message could not be sent.';
							   echo 'Mailer Error: ' . $mail->ErrorInfo;
							   exit;
							}
				 * 
				 */
				$strstatus = "Kami telah mengirimkan email untuk verifikasi lupa password ini.";
				unset($email);
			} else $strstatus = "Data email tidak ada atau email Anda belum diaktifkan.";
		} else $strstatus = "Format email Anda tidak valid atau tidak ada.";
	}
	if (!isset($_GET['s'])) { $sesicp = ""; }
	else {	$sesicp = $_GET['s']; }
	if (!isset($_GET['i'])) { $idmembercp = ""; }
	else { $idmembercp = $_GET['i']; }
	if (!empty($sesicp) && !empty($idmembercp)) {
		$q = "SELECT cppasswd FROM tb_member WHERE idmember='$idmembercp' AND cpsesi='$sesicp'";
		if (!$result=$conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			$r = $result->fetch_assoc();
			$qs = "UPDATE tb_member SET passwd='$r[cppasswd]', cppasswd=NULL, cpsesi=NULL WHERE idmember='$idmembercp'";
			if (!$results=$conn->query($qs)) die ($conn->error);
			$strstatus = "Data password Anda telah diubah, silahkan login kembali dengan password baru Anda.";
		}
	}
?>
<script>
	function cekforget() {
		var f = document.frmlogin;
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
	}
</script>
<div class="garisbawah"><span class="judulgaris">Forget Password</span></div>
<br>
<div class="row">
	<div class="col-md-12">
		<?=pstrstatus($strstatus)?>
			<form class="form-horizontal" role="form" action="index.php?m=<?=$m?>&id=<?=$idmember?>" name="frmlogin" id="frmlogin" method="post">
			  	<div class="form-group">
			    	<label for="email" class="col-md-3 control-label">Email</label>
			    	<div class="col-md-6">
			      		<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$email?>" required>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-3 col-sm-10">
			      		<input type=submit name=btnforget value="Submit" class="btn btn-primary" onclick="return cekforget();">
			    	</div>
			  	</div>
			</form>
	</div>
</div>