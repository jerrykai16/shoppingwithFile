<?php
    session_start();
    $tel = $_SESSION["tel"];
    session_destroy();
    $_SESSION["tel"] = $tel;
    header("Location: catalog.php");
?>