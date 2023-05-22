<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];
    } else {
        Header("Location: blog.php");
    }

    $blogID = $_GET['blogID'];
    $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    // echo "<pre>";
    // var_dump($blogInfo);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="blog__title" style="background-image: url(../assets/blog/<?=$blogInfo['blogImgFile']?>);">
            <span class="cate"><?=$blogInfo['blogCategory']?></span>
            <h2 class="title"><?=$blogInfo['blogTitle']?></h2>
            <div class="info">
                <span class="author"><?=$blogInfo['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                <div class="modify">
                    <a href="#">수정</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </div>
        <!-- //blog__title -->

        <div class="blog__inner">
            <div class="left mt70">
                <div class="blog__contents">
                    <h3><?=$blogInfo['blogTitle']?></h3>
                    <?=$blogInfo['blogContents']?>
                </div>                
            </div>
            <div class="right">
                <div class="blog__aside">
                    <?php include "../include/blogTitle.php" ?>
                    <?php include "../include/blogCate.php" ?>
                    <?php include "../include/blogNew.php" ?>
                    <?php include "../include/blogPopular.php" ?>
                    <?php include "../include/blogComment.php" ?>
                </div>
            </div>
        </div>
        <!-- //blog__inner -->

        <div class="blog__article">
            <h3>관련글</h3>
            <?php include "../include/blogArticle.php" ?>
        </div>
        <!-- //blog__article -->

        <div class="blog__comment">
            <h3>댓글 쓰기</h3>
            <div class="comment__view">
                <div class="avatar">
                    <img src="https://t1.daumcdn.net/tistory_admin/blog/admin/profile_default_06.png" alt="">
                </div>
                <div class="info">
                    <span class="nickname">곰돌이</span>
                    <span class="date">2022.01.01</span>
                    <p class="msg">잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다.</p>
                    <div class="comment__modify">
                        <label for="msg__modify" class="blind">수정 내용</label>
                        <textarea name="msg__modify" id="msg__modify" rows="4" placeholder="수정할 내용을 적어주세요."></textarea>
                        <label for="commentPass" class="blind">비밀번호</label>
                        <input type="password" id="commentPass" name="commentPass" placeholder="비밀번호">
                        <button id="commentModifyCancel">취소</button>
                        <button id="commentModifyButton">수정</button>
                    </div>
                    <div class="del">
                        <a href="#" class="comment__del__del">삭제</a>
                        <a href="#" class="comment__del__mod">수정</a>
                    </div>
                </div>
            </div>
            <div class="comment__view">
                <div class="avatar">
                    <img src="https://t1.daumcdn.net/tistory_admin/blog/admin/profile_default_06.png" alt="">
                </div>
                <div class="info">
                    <span class="nickname">곰돌이</span>
                    <span class="date">2022.01.01</span>
                    <p class="msg">잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다. 잘 보고 갑니다.</p>
                    <div class="comment__delete">
                        <label for="commentPass" class="blind">비밀번호</label>
                        <input type="password" id="commentPass" name="commentPass" placeholder="비밀번호">
                        <button id="commentDeleteCancel">취소</button>
                        <button id="commentDeleteButton">삭제</button>
                    </div>
                    <div class="del">
                        <a href="#" class="comment__del__del">삭제</a>
                        <a href="#" class="comment__del__mod">수정</a>
                    </div>
                </div>
            </div>

            <div class="comment__write">
                <label for="commentPass" class="blind">비밀번호</label>
                <input type="password" id="commentPass" name="commentPass" placeholder="비밀번호">
                <label for="commentName" class="blind">이름</label>
                <input type="text" id="commentName" name="commentName" placeholder="이름">
                <label for="commentWrite" class="blind">댓글 쓰기</label>
                <textarea id="commentWrite" name="commentWrite" rows="4" placeholder="댓글을 남겨주세요!"></textarea>
                <button type="submit" class="btnStyle3 mt10">댓글 쓰기</button>
            </div>
        </div>
        <!-- //blog__comment -->
    </main>
    <!-- //main -->


    <?php include "../include/footer.php" ?>
    <!-- //footer -->


</body>
</html>