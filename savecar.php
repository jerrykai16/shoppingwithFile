<?php
    session_start();
    $pId = $_GET["id"];


    $idArr = $_SESSION["id"];
    $idArr[] = $pId;
    $_SESSION["id"] = $idArr;
    
    print_r($idArr);
    header("Location:catalog.php");
?>