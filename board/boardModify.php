<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 수정하기 페이지</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <div class="intro__images small">
                <picture>
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                    <img src="../assets/img/board01.png" alt="회원가입 이미지">
                </picture>
            </div>
            <h2>게시글 수정하기</h2>
            <p class="intro__text">
                웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>관련 문의사항은 여기서 확인하세요! 
            </p>
        </div>
        <!-- //intro__inner -->

        <div class="board__inner">
            <div class="board__write">
                <form action="boardModifySave.php" name="boardWriteSave" method="post">
                    <fieldset>
                        <legend class="blind">게시글 수정하기</legend>
<?php
    $boardID = $_GET['boardID'];

    $sql = "SELECT boardID, boardTitle, boardContents FROM board WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value='".$info['boardID']."'></div>";
        // ID를 GET 방식으로 가져오기 때문에 POST로 보내기 위해 div 하나 더 만들고 none 했음.
        
        echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
        echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
        echo "<div class='mt50'><label for='boardPass'>비밀번호</label><input type='password' id='boardPass' name='boardPass' class='inputStyle' autocomplete='off' required placeholder='글을 수정하려면 비밀번호를 입력해야 합니다.'></div>";
        echo "<a href='board.php' class='btnStyle3'>목록보기</a>";
    }
?>
                        <!-- <div>
                            <label for="boardTitle">제목</label>
                            <input type="text" id="boardTitle" name="boardTitle" class="inputStyle">
                        </div>
                        <div>
                            <label for="boardContents">내용</label>
                            <textarea name="boardContents" id="boardContents" rows="20" class="inputStyle"></textarea>
                        </div> -->
                        <button type="submit" class="btnStyle3">수정하기</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </main>

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>