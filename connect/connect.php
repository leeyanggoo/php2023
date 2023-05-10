<?php
    // $host = "localhost",
    // $user = "leeyanggoo",
    // $pw = "as024631!"
    // $db = "leeyanggoo",
    // $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf-8");

    // if(mysqli_connect_errno()){
    //     echo "database Connect False";
    // } else {
    //     echo "database Connet True";
    // }
?>

<!-- 로컬용 -->
<?php
    // phpinfo();
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "phpClass";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "database Connect False";
    } else {
        // echo "database Connet True";
    }
?>