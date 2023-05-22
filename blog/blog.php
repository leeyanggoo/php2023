<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>"
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
        <div class="blog__search bmStyle">
            <h2>개발자 블로그 입니다.</h2>
            <p>'개'속 '발'전하는 곳입니다.</p>
            <div class="search">
                <form action="#" name="#" method="POST">
                    <legend class="blind">블로그 검색</legend>
                    <input type="search" class="inputStyle2" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요!">
                    <button type="submit" class="btnStyle4 ml20">검색하기</button>
                    <!-- <a href="blogWrite.html" class="btnStyle4 white">글쓰기</a> -->
                    <?php if(isset($_SESSION['memberID'])){ ?>
                        <a href="blogWrite.php" class="btnStyle4 white">글쓰기</a>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="blog__inner">
            <div class="left">
                <div class="blog__wrap">
                    <h2>All Posts</h2>
                    <div class="cards__inner col2 line2">
                        <!-- <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog01.png, ../assets/img/blog01@2x.png 2x, ../assets/img/blog01@3x.png 3x">
                                <img src="../assets/img/blog01.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>새로운 기술과 도구 탐색</h3>
                                <p>프론트엔드 개발은 계속 진화하고 있으므로, 최신 기술과 도구를 탐색하고 습득하는 것이 중요합니다. 트렌드에 맞는 프레임워크, 라이브러리, 플러그인 등을 적극적으로 익히고 활용해보세요. 개발 커뮤니티, 온라인 강의, 튜토리얼 등을 통해 학습할 수 있습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                            </div>
                        </div> -->
<?php
    $sql = "SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
<!-- 데이터 불러오기 -->
<?php foreach($result as $blog){ ?>
    <div class="card">
        <figure class="card__img">
            <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
            </a>
        </figure>
        <div class="card__title">
            <h3><?=$blog['blogTitle']?></h3>
            <p><?=$blog['blogContents']?></p>
        </div>
        <div class="card__info">
            <a href="#" class="more">더보기</a>
        </div>
    </div>
<?php } ?>
                    </div>
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
    </main>
    <!-- //main -->


    <?php include "../include/footer.php" ?>
    <!-- //footer -->


</body>
</html>