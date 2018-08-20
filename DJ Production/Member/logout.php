<?php
    session_start();
    $_SESSION['w_isuser'] = "";
    $_SESSION['w_isnama'] = "";
    $_SESSION['w_isiduser'] = "";
    $_SESSION['w_iswwwsec'] = "";
	$_SESSION['w_isppage'] = "";
    unset($_SESSION['w_isuser']);
    unset($_SESSION['w_isnama']);
    unset($_SESSION['w_isiduser']);
    unset($_SESSION['w_iswwwsec']);
	unset($_SESSION['w_isppage']);
    session_destroy();
    Header("Location: index.php");
?>