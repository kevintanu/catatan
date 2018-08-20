<?php
	session_start();
	require_once("../dbConnect.php");
    if (isset($_POST['btnlogin'])) {
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $q = "SELECT idmember,email,passwd,nama FROM tb_member WHERE email='$email' AND passwd='".md5($password)."'";
        if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
	        $r = $result->fetch_assoc();
	        if (($r[email] == $email) && ($r[passwd] == md5($password))) {
	            $_SESSION['m_isuser'] = $email;
	            $_SESSION['m_isnama'] = $r[nama];
	            $_SESSION['m_isiduser'] = $r[idmember];
				$_SESSION['m_isppage'] = 10;
	            $_SESSION['m_iswwwsec'] = md5($email.$_SERVER['HTTP_USER_AGENT']);
	            Header("Location: member.php");
	        } else $strstatus = "Email atau Password Anda salah.";
		} else $strstatus = "Email atau Password Anda salah.";
    }
	include("header.inc.php");
	include("frmlogin.inc.php");
	include("footer.inc.php");
?>