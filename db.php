<?php
    $h = "sql304.infinityfree.com";
    $u = "if0_41229423";
    $p = "NAT0992726700A";
    $db = "if0_41229423_db_n";

    $conn = new mysqli($h,$u,$p,$db);

    if($conn->connect_error){
        die('Error' .$conn->connect_error);
    } 

    $conn->set_charset("utf8");
?>