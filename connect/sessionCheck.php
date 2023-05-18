<?php
    // 로그인 하지 않았을 경우 로그인 페이지로 이동
    if(!isset($_SESSION['memberID'])){

        echo "<script>alert('로그인을 먼저 해야 합니다.')</script>";
        echo "<script>location.href='../login/login.php'</script>";

        //Header("location:../login/login.php");
    }
?>