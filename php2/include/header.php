<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<header id="header">
    <h1><a href="../main/main.php">헬드백</a></h1>
    <div class="header__login">
      <?php if(isset($_SESSION['memberID'])){
            $memberID = $_SESSION['memberID'];
            $sql = "SELECT * FROM userMembers WHERE memberID = {$memberID}";
            $result = $connect -> query($sql);
            $info = $result -> fetch_array(MYSQLI_ASSOC);
        ?>
        <ul>
            <li><a href="#"><?= $_SESSION['userName'] ?> 회원님</a></li>
        </ul>
      <?php } ?>
    </div>
    <div class="icon__box">
        <ul>
            <?php if(isset($_SESSION['memberID'])){?>
                <li class="logout"><a href="../login/logout.php"><img src="../html/assets/img/icon_logout.svg" alt="로그아웃" title="로그아웃"></a></li>
                <li><a href="../mypage/mypage.php"><img src="../html/assets/img/icon_mypage.svg" alt="마이페이지" title="마이페이지"></a></li>
            <?php } else{?>
                <li class="login"><img src="../html/assets/img/icon_login.svg" alt="로그인" title="로그인"></li>
            <?php } ?>
            <li class="btn__menu"><a href="#c"><img src="../html/assets/img/icon_menu.svg" alt="메뉴" title="메뉴"></a></li>
        </ul>
    </div>
</header>

<!-- //header -->
<nav id="nav">
    <button>X</button>
    <div class="nav__wrap">
        <?php if(isset($_SESSION['memberID'])){?>
            <img class="profile" src="../assets/profile/<?= $info['userImgSrc']?>" alt="프로필">
            <a class="logout btnStyle5" href="../login/logout.php">로그아웃</a>
        <?php } else{?>
            <img src="../html/assets/img/logo.png" alt="logo">
            <a href="#c" class="login btnStyle5">로그인</a>
        <?php } ?>
        <ul>
        <?php if(isset($_SESSION['memberID'])){?>
            <li><a href="../main/intro.html">헬드백 소개</a></li>
            <li><a href="../main/mainSection.php">운동 종류</a></li>
            <li><a href="../blog/blog.php">운동 방법 공유</a></li>
            <li><a href="../board/board.php">커뮤니티</a></li>
            <li><a href="../mypage/mypage.php">마이페이지</a></li>
        <?php } else{?>
            <li><a href="../main/intro.html">헬드백 소개</a></li>
            <li><a href="../main/mainSection.php">운동 종류</a></li>
            <li><a href="../blog/blog.php">운동 방법 공유</a></li>
            <li><a href="../board/board.php">커뮤니티</a></li>
        <?php } ?>
        </ul>
    </div>
</nav>
<!-- //nav -->

<div class="login__popup">
    <div class="login__wrap">
        <div class="login__title">
            <div class="login__logo">
                <img src="../html/assets/img/logo.png" alt="로고">
            </div>
            <div class="login__desc">
                <h2>login</h2>
                <span class="desc">아이디 비밀번호를 입력해주세요!</span>
            </div>
        </div>
        <div class="login__form">
            <form action="../login/loginSave.php" name="login" method="post">
                <fieldset>
                <legend class="blind">아이디와 비밀번호 입력해주세요</legend>
                    <input type="text" class="inputStyle" name="userEmail" placeholder="이메일을 입력해주세요!">
                    <input type="password" class="inputStyle" name="userPass" placeholder="비밀번호를 입력해주세요!">
                    <div class="login__list">
                        <ul>
                            <li><a href="../login/idFind.php">아이디 찾기</a></li>
                            <li><a href="../login/pwdFind.php">비밀번호 찾기</a></li>
                            <li><a href="../join/conditions.php">회원가입</a></li>
                        </ul>
                    </div>
                    <button type="submit" class="btnStyle">로그인</button>
                    <button type="button" class="btnStyle close">닫기</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<!-- //login__popup -->

<script>
    const btnMenu = document.querySelector(".btn__menu");
    const btnClose = document.querySelector("#nav button");
    // 사이드 메뉴
    btnMenu.addEventListener("click", () => {
        document.querySelector("#nav").style.transform = "translateX(0%)";
    })
    btnClose.addEventListener("click", () => {
        document.querySelector("#nav").style.transform = "translateX(100%)";
    })
    // 로그인 버튼
    document.querySelector(".icon__box .login").addEventListener("click", () => {
        document.querySelector(".login__popup").style.display = "block";
    });
    document.querySelector(".close").addEventListener("click", () => {
        document.querySelector(".login__popup").style.display = "none";
    });
    document.querySelector(".nav__wrap .login").addEventListener("click", () => {
        document.querySelector(".login__popup").style.display = "block";
    });
</script>