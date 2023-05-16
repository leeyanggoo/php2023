<?php
    $host = "localhost";
    $user = "leeyanggoo";
    $pw = "as024631!";
    $db = "leeyanggoo";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("uft-8");

    if(mysqli_connect_errno()){
        echo "Database Connect False";
    } else {
        // echo "Database Connect True";
    }
?>