<?php
  include "../connect/connect.php";
  include "../connect/session.php";
//   echo $_SESSION['adminMemberID'], $_SESSION['adminEmail'], $_SESSION['adminName'];
  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">
    <!-- SCRIPT -->
    <script defer src="assets/js/common.js"></script>
</head>
<body>
    <div id="wrap">
        <?php include "../include/skip.php"; ?>
        <!-- //SKIP -->
        <?php include "../include/header.php"; ?>
        <!-- //header -->
        <div class="slider__wrap">
            <div class="slider__img">
                <div class="slider__inner">
                    <div class="slider">
                        <img src="../html/assets/img/slider_01.png" class="img__logo">
                    </div>
                    <div class="slider">
                        <img src="../html/assets/img/slider_02.png" alt="이미지2">
                    </div>
                    <div class="slider">
                        <img src="../html/assets/img/slider_03.png" alt="이미지3">
                    </div>
                </div>
            </div>
        </div>
        <!-- banner -->
        <section id="contents">
            <h2><a href="mainSection.php">운동 종류</a></h2>
            <div class="contents__inner">
                <div class="content1">
                    <a href="mainSection.php#chest">
                        <h3>가슴</h3>
                        <em>Chest Exersise</em>
                    </a>
                </div>
                <div class="content2">
                    <a href="mainSection.php#back">
                        <h3>등</h3>
                        <em>Back Exersise</em>
                    </a>
                </div>
                <div class="content3">
                    <a href="mainSection.php#shoulder">
                        <h3>어깨</h3>
                        <em>Shoulder Exersise</em>
                    </a>
                </div>
            </div>
            <div class="contents__inner">
                <div class="content4">
                    <a href="mainSection.php#leg">
                        <h3>하체</h3>
                        <em>Lower Body</em>
                    </a>
                </div>
                <div class="content5">
                    <a href="mainSection.php#arm">
                        <h3>팔</h3>
                        <em>Arm Exersise</em>
                    </a>
                </div>
                <div class="content6">
                    <a href="mainSection.php#abs">
                        <h3>복근</h3>
                        <em>Sit-Up</em>
                    </a>
                </div>
            </div>
        </section>
        <!-- contents -->
        <section id="sub">
            <div class="sub__inner">
                <div class="sub1">
                    <div class="sub1__desc">
                        <h3>필수 요소</h3>
                        <p>
                            운동을 하려면 필요한 필수 요소가 있습니다.<br>
                            의지, 운동 장비, 운동 자세, 전문가와 상담, 휴식, 식습관, 목표가 있습니다.
                        </p>
                    </div>
                    <div class="sub1__icon__box">
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_01.svg" alt="운동 장비">
                            <p>운동 장비</p>
                        </div>
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_02.svg" alt="운동 자세">
                            <p>운동 자세</p>
                        </div>
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_03.svg" alt="운동 계획">
                            <p>운동 계획</p>
                        </div>
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_04.svg" alt="식습관 및 수분 섭취">
                            <p>식습관 및 수분 섭취</p>
                        </div>
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_05.svg" alt="운동 목표">
                            <p>운동 목표</p>
                        </div>
                        <div class="sub__icon">
                            <img src="../html/assets/img/sub_icon_06.svg" alt="의지">
                            <p>의지</p>
                        </div>
                    </div>
                </div>
                <div class="sub2">
                    <div class="sub2__icon">
                        <img src="../html/assets/img/sub2_icon_01.svg" alt="주의점">
                    </div>
                    <div class="sub2__desc">
                        <h3>주의점</h3>
                        <p>
                            운동 시 주의할 점이 많습니다.<br>
                            운동을 하기 전에 미리 알아두면 좋습니다.
                        </p>
                        <a href="../intro/intro.php#danger">자세히 보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- sub -->
        <?php include "../include/footer.php"; ?>
    </div>
    <script>
        const slider = document.querySelectorAll(".slider");
        const sliderInner = document.querySelector(".slider__inner");
        const sliderImg2 = document.querySelector(".slider__img");

        // 슬라이더
        let currentIndex = 0;
        let sliderCount = slider.length;
        let sliderW = slider[0].offsetWidth;

        sliderInner.style.transition = "all 0.6s";
        setInterval(() => {
            currentIndex = (currentIndex+1) % sliderCount;
            sliderInner.style.transform = "translateX(" + (-sliderW * currentIndex) + "px)";
        }, 3000);

    </script>
</body>
</html>