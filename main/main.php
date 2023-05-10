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
    <title>메인 페이지</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner container">
            <div class="intro__images">
                <!-- <img src="assets/img/intro01.png" alt="소개 이미지"> -->
                <picture>   <!-- 같은 이미지일 지라도 디스플레이의 해상도(밀도)에 따라 다른 이미지를 제공하기 위한 태그 -->
                    <source srcset="../assets/img/intro01.png, ../assets/img/intro01@2x.png 2x, ../assets/img/intro01@3x.png 3x"> <!-- 디스플레이 환경에 따라 작은 크기의 이미지 제공 -->
                    <img src="../assets/img/intro01.png" alt="소개 이미지">
                </picture>
            </div>
            <p class="intro__text">가장 첫 번째 단계는 무언가 가능하다는 것을 믿는 것입니다. 그러면 확률이란 게 발생합니다.
                충분히 중요한 일이 있다면, 가능성이 없더라도 해야 합니다.<br>
                -일론 머스크
            </p>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>