<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardView = 1;
    $regTime = time();
    $memberID = $_SESSION['memberID'];

    // 이상한 문자열 방지(HTML 코드 등을 써서 해킹한다거나 ㄷㄷ)
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);

    $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$boardView', '$regTime')";
    $connect -> query($sql);
?>

<script>
    location.href = "board.php";    //php에 Header() 써도 되는데 자바스크립도 가능함 ㄷㄷ
</script>