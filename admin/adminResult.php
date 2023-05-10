<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <?php include "../include/head.php" ?>
    <style>
        .money {
            background-image: url(../assets/img/money.jpg);
            width: 660px;
            height: 300px;
            background-position: center center;
            background-size: contain;
            background-repeat: no-repeat;
            transform: translate(50%, -500%);
        }
        @keyframes fall {
            from { }
            to {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="gray">
    
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
    <div class="intro__inner center bmStyle">
            <div class="intro__images good">
                <picture>
                    <source srcset="../assets/img/admin01.png, ../assets/img/admin01@2x.png 2x, ../assets/img/admin01@3x.png 3x">
                    <img src="../assets/img/admin01.png" alt="회원가입 이미지">
                </picture>
            </div>
            <p class="intro__text">
                회원가입을 축하드립니다. 환영합니다.<br>
                로그인을 해주세요!
            </p>
            <div class="join__inner container">
                <div class="join__fun">
                    <h2 class="wave">ㅊㅋ</h2>
                </div>
                <div class="index">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li class="active">3</li>
                    </ul>
                </div>
            </div>
            <div class="intro__btn">
                <a href="login.html">관리자 로그인</a>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script>
        const MIN_DURATION = 5;
        const body = document.querySelector("body");

        window.onload = makeMoney();
        function makeMoney() {
            const money = document.createElement("div");
            const delay = Math.random() * 10;
            const randomOpacity = Math.random();
            const duration = Math.random() * 20 + MIN_DURATION;

            money.classList.add("money", "fixed");
            money.style.left = `${Math.random() * window.screen.width}px`;
            money.style.animationDelay = `${parseInt(delay)}s`;
            money.style.opacity = randomOpacity;
            money.style.animation = `fall ${duration}s linear`;

            body.appendChild(money);

            setTimeout(() => {
                body.removeChild(money);
                makeMoney();
            }, (duration + delay) * 1000);
        };
        for(let index = 0; index < 30; index++){
            setTimeout(makeMoney, 500 * index);
        };
    </script>
</body>
</html>