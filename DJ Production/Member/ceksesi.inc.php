<?php
    if ($_SESSION['m_iswwwsec'] != md5($_SESSION['m_isuser'].$_SERVER['HTTP_USER_AGENT'])) {
        Header("Location: logout.php");
    } else {
        $oklogin = true;
		$idmember = $_SESSION['m_isiduser'];
		$email = $_SESSION['m_isuser'];
    }
?>