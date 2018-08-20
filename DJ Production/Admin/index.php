<?php
	session_start();
	require_once("../dbConnect.php");
	$strstatus = "";
    if (isset($_POST['btnlogin'])) {
        $username = $_POST['username'];
        $password = $_POST['passwd'];
        $q = "SELECT iduser,username,passwd,nama,idlevel FROM tb_user WHERE username='$username' AND passwd='".md5($password)."'";
        if (!$result = $conn->query($q)) die ($conn->error);
        $r = $result->fetch_assoc();
        if (($r[username] == $username) && ($r[passwd] == md5($password))) {
            $_SESSION['isuser'] = $username;
            $_SESSION['isnama'] = $r[nama];
            $_SESSION['isiduser'] = $r[iduser];
            $_SESSION['islevel'] = $r[idlevel];
			$_SESSION['isppage'] = 10;
            $_SESSION['iswwwsec'] = md5($username.$_SERVER['HTTP_USER_AGENT']);
            Header("Location: main.php");
        } else $strstatus = "Username atau Password Anda salah.";
    }
	include("header.inc.php");
	include("frmlogin.inc.php");
	include("footer.inc.php");
?>