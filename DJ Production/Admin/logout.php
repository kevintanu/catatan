<?php
    session_start();
    $_SESSION['isuser'] = "";
    $_SESSION['isnama'] = "";
    $_SESSION['isiduser'] = "";
    $_SESSION['islevel'] = "";
    $_SESSION['iswwwsec'] = "";
	$_SESSION['isppage'] = "";
    unset($_SESSION['isuser']);
    unset($_SESSION['isnama']);
    unset($_SESSION['isiduser']);
    unset($_SESSION['islevel']);
    unset($_SESSION['iswwwsec']);
	unset($_SESSION['isppage']);
    session_destroy();
    Header("Location: index.php");
?>