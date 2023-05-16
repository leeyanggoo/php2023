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
                        <div class="card">
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
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog02.png, ../assets/img/blog02@2x.png 2x, ../assets/img/blog02@3x.png 3x">
                                <img src="../assets/img/blog02.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>프로젝트 경험 쌓기</h3>
                                <p>실제 프로젝트에 참여하여 경험을 쌓는 것은 중요합니다. 개인 프로젝트나 오픈 소스 프로젝트에 기여하거나, 팀 프로젝트에 참여하여 협업 능력을 향상시킬 수 있습니다. 다양한 프로젝트에 참여하면서 문제를 해결하고 새로운 아이디어를 구현해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog03.png, ../assets/img/blog03@2x.png 2x, ../assets/img/blog03@3x.png 3x">
                                <img src="../assets/img/blog03.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>코드 리뷰와 피드백 받기</h3>
                                <p>다른 개발자들과 소통하고 협업하는 능력을 키우기 위해 코드 리뷰와 피드백을 받는 것이 중요합니다. 개발 커뮤니티나 오픈 소스 프로젝트에서 다른 사람들의 코드를 검토하고, 자신의 코드에 대한 피드백을 받아보세요. 이를 통해 개선할 점을 찾고 더 나은 코드를 작성할 수 있습니다.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog04.png, ../assets/img/blog04@2x.png 2x, ../assets/img/blog04@3x.png 3x">
                                <img src="../assets/img/blog04.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>사용자 경험(UX)에 대한 이해</h3>
                                <p>프론트엔드 개발은 사용자와 직접적으로 상호작용하는 부분이 많습니다. 따라서 사용자 경험에 대한 이해가 필요합니다. 사용자 중심의 디자인과 인터페이스 원칙을 학습하고, 웹 사이트나 애플리케이션의 사용자 경험을 개선하기 위해 노력해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog04.png, ../assets/img/blog04@2x.png 2x, ../assets/img/blog04@3x.png 3x">
                                <img src="../assets/img/blog04.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>사용자 경험(UX)에 대한 이해</h3>
                                <p>프론트엔드 개발은 사용자와 직접적으로 상호작용하는 부분이 많습니다. 따라서 사용자 경험에 대한 이해가 필요합니다. 사용자 중심의 디자인과 인터페이스 원칙을 학습하고, 웹 사이트나 애플리케이션의 사용자 경험을 개선하기 위해 노력해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog04.png, ../assets/img/blog04@2x.png 2x, ../assets/img/blog04@3x.png 3x">
                                <img src="../assets/img/blog04.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>사용자 경험(UX)에 대한 이해</h3>
                                <p>프론트엔드 개발은 사용자와 직접적으로 상호작용하는 부분이 많습니다. 따라서 사용자 경험에 대한 이해가 필요합니다. 사용자 중심의 디자인과 인터페이스 원칙을 학습하고, 웹 사이트나 애플리케이션의 사용자 경험을 개선하기 위해 노력해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog04.png, ../assets/img/blog04@2x.png 2x, ../assets/img/blog04@3x.png 3x">
                                <img src="../assets/img/blog04.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>사용자 경험(UX)에 대한 이해</h3>
                                <p>프론트엔드 개발은 사용자와 직접적으로 상호작용하는 부분이 많습니다. 따라서 사용자 경험에 대한 이해가 필요합니다. 사용자 중심의 디자인과 인터페이스 원칙을 학습하고, 웹 사이트나 애플리케이션의 사용자 경험을 개선하기 위해 노력해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card__img">
                                <source srcset="../assets/img/blog04.png, ../assets/img/blog04@2x.png 2x, ../assets/img/blog04@3x.png 3x">
                                <img src="../assets/img/blog04.png" alt="소개 이미지">
                            </figure>
                            <div class="card__title">
                                <h3>사용자 경험(UX)에 대한 이해</h3>
                                <p>프론트엔드 개발은 사용자와 직접적으로 상호작용하는 부분이 많습니다. 따라서 사용자 경험에 대한 이해가 필요합니다. 사용자 중심의 디자인과 인터페이스 원칙을 학습하고, 웹 사이트나 애플리케이션의 사용자 경험을 개선하기 위해 노력해보세요.</p>
                            </div>
                            <div class="card__info">
                                <a href="#" class="more">더보기</a>
                                <!-- <span>글쓴이</span>
                                <span>조회수</span>
                                <span>좋아요</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog__aside">
                    <div class="intro">
                        <div class="img">
                            <picture>
                                <source srcset="../assets/img/intro02.png, ../assets/img/intro02@2x.png 2x, ../assets/img/intro02@3x.png 3x">
                                <img src="../assets/img/intro02.png" alt="소개 이미지">
                            </picture>
                        </div>
                        <p class="text">Jesus Crying<br>
                            난 그러라고 한 적 없다.</p>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기글</h4>
                    </div>
                    <div class="cate">
                        <h4>최근 댓글</h4>
                    </div>
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