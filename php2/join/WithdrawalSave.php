<?php
    include "../connect/connect.php";
    include "../connect/session.php";


    $WithdrawalPass = $_POST['WithdrawalPass'];
    $userID = $_SESSION['memberID'];

    echo $userID;
    // userMembers
    $sql = "DELETE FROM userMembers WHERE memberID = '$userID'";

    if ($connect -> query($sql) == TRUE) {
        include "../login/logout.php";
        echo "회원 탈퇴가 성공적으로 처리되었습니다.";
    } else {
        echo "회원 탈퇴를 처리하는 동안 오류가 발생하였습니다: " . $conn->error;
    }

    // 데이터베이스 연결 종료
    // $conn->close();
?>
