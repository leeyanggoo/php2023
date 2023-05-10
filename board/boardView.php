<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 페이지</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center">
            <div class="intro__images small">
                <picture>
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                    <img src="../assets/img/board01.png" alt="회원가입 이미지">
                </picture>
            </div>
            <h2>게시글 보기</h2>
            <p class="intro__text">
                웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>관련 문의사항은 여기서 확인하세요! 
            </p>
        </div>
        <!-- //intro__inner -->

        <div class="board__inner">
            <div class="board__view">
                <table>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 80%;">
                    </colgroup>
                    <tbody>
                        <!-- <tr>
                            <th>제목</th>
                            <td>게시판 제목입니다.</td>
                        </tr>
                        <tr>
                            <th>등록자</th>
                            <td>이양구</td>
                        </tr>
                        <tr>
                            <th>등록일</th>
                            <td>2023-04-20</td>
                        </tr>
                        <tr>
                            <th>조회수</th>
                            <td>99</td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td>
                                
                            </td>
                        </tr> -->
<?php
    // 게시글 번호 확인
    if(isset($_GET['boardID'])) {
        $boardID = $_GET['boardID'];

        // 보드 뷰 + 1
        $sql = "UPDATE board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
        $connect -> query($sql);


        // echo $boardID;

        $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
        $result = $connect -> query($sql);

        if($result && $result->num_rows > 0){
            $info = $result -> fetch_array(MYSQLI_ASSOC);

            echo "<tr><th>제목</th><td>".$info['boardTitle']."<td/></tr>";
            echo "<tr><th>등록자</th><td>".$info['youName']."<td/></tr>";
            echo "<tr><th>등록일</th><td>".date('Y-m-d', $info['regTime'])."<td/></tr>";
            echo "<tr><th>조회수</th><td>".$info['boardView']."<td/></tr>";
            echo "<tr><th>내용</th><td>".$info['boardContents']."<td/></tr>";
        } else {
            // echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
            echo "<script>alert('게시글이 없습니다.');location.href = 'board.php';</script>";
        }
    } else {
        // echo "<tr><td colspan='5'>잘못된 접근입니다.</td></tr>";
        echo "<script>alert('잘못된 접근입니다.');location.href = 'board.php';</script>";
    }
?>
                    </tbody>
                </table>
            </div>
            <div class="board__btn mb100">

            <?php
                if (isset($_GET['boardID'])){
                    if ($result && $result->num_rows > 0){
                        $sql = "SELECT memberID FROM board WHERE boardID = {$boardID}";
                        $result2 = $connect -> query($sql);
                        $userID = $result2->fetch_assoc();

                        // 로그인 여부 확인
                        if(isset($_SESSION['memberID'])){
                            if($userID['memberID'] == $_SESSION['memberID']){
                                echo "<a href='boardModify.php?boardID=".$_GET['boardID']."' class='btnStyle3'>수정하기</a>";
                                echo "<a href='boardRemove.php?boardID=".$_GET['boardID']."' class='btnStyle3' onclick='return confirm(\"정말 삭제할 거임?\")'>삭제하기</a>";
                            } 
                        }
                    }
                }
            ?>
                <a href="board.php" class="btnStyle3">목록보기</a>
            </div>
        </div>

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>