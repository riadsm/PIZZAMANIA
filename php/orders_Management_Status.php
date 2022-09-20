<?php
    include 'fonctions.php';
    $coo = mysqli_connect($dbserver, $dbusername,$dbpassword,$dbname);    
    mysqli_set_charset($coo, 'utf8');
    
    $orderID = $_GET['orderID'];
    $orderStatus = $_GET['status'];    
    $sql = "UPDATE COMMAND SET commandStatus='".$orderStatus."' WHERE (orderID=".$orderID.")";
    echo $sql;
    $coo->query($sql);
    $coo->close();
?>