<?php
    if ($_SESSION['iswwwsec'] != md5($_SESSION['isuser'].$_SERVER['HTTP_USER_AGENT'])) {
        Header("Location: logout.php");
    } else {
        $oklogin = true;
        $isuser = $_SESSION['isuser'];
        $isnama = $_SESSION['isnama'];
        $isiduser = $_SESSION['isiduser'];
        $islevel = $_SESSION['islevel'];
    }
?>