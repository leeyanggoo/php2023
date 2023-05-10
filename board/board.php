<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
        <div class="intro__inner center bmStyle">
            <div class="intro__images small">
                <picture>
                    <source srcset="../assets/img/board01.png, ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                    <img src="../assets/img/board01.png" alt="회원가입 이미지">
                </picture>
            </div>
            <h2>게시판</h2>
            <p class="intro__text">
                웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>관련 문의사항은 여기서 확인하세요! 
            </p>
        </div>
        <!-- //intro__inner -->

        <div class="board__inner">
            <div class="board__search">
                <div class="left">
                    * 총 <em></em>건의 게시물이 등록되어 있습니다.
                </div>
                <div class="right">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요." required>
                            <select name="searchOption" id="searchOption">
                                <option value="title">제목</option>
                                <option value="content">내용</option>
                                <option value="name">등록자</option>
                            </select>
                            <button type="submit" class="btnStyle3 white">검색</button>
                            <a href="boardWrite.php" class="btnStyle3">글쓰기</a>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목</a></td>
                            <td>이름</td>
                            <td>2023-04-20</td>
                            <td>100</td>
                        </tr> -->
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page']; // (int)를 적어서 타입(type)을 명시함
    } else {
        $page = 1;
    }

    $viewNum = 10; // 한 페이지에 보여줄 개시글 개수
    $viewLimit = ($viewNum * $page) - $viewNum;

    // 1~20 LIMIT 0, 20     > page1 (viewNum * 1) - viewNum
    // 21~40 LIMIT 20, 20   > page2 (viewNum * 2) - viewNum
    // 41~60 LIMIT 40, 20
    // 61~80 LIMIT 60, 20

    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                // 데이터 입력하기
                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                    </tbody>
                </table>
            </div>
            <div class="board__pages">
                <ul>
<?php
    // 게시글이 총 개수?
    // 몇 페이지 나옴?

    $sql = "SELECT count(boardID) FROM board";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

    // 게시판에 등록한 총 게시물 개수
    echo "<script>
        document.querySelector('.left em').innerText = '{$boardTotalCount}';
    </script>";

    // 총 페이지 개수
    $boardTotalCount = ceil($boardTotalCount / $viewNum);

        // 1 2 3 4 5 [6] 7 8 9 10 11 ... $boardTotalCount 까지 하면 너무 많이 나옴 ㅠㅠ
    $pageView = 4; // 그래서 기준 페이지 앞뒤로 만들 페이지 개수 설정함
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 + 마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로 + 이전
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
    }

    // 페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active"; // 보고 있는 페이지가 같으면 active라는 문자열 추가

        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    // 다음
    // if($page != $boardTotalCount){
    //     $nextPage = $page + 1; 
    //     echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
    //     echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    // }

    if($page > 0 && $page < $boardTotalCount){
        $nextPage = $page + 1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    }

    // 게시글이 없을 때?
    if($page > $boardTotalCount || $page <= 0){
        echo "<script>alert('게시글이 없습니다.');location.href = 'board.php';</script>";
    }
?>
                    <!-- <li><a href="#">처음으로</a></li>
                    <li><a href="#">이전</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">다음</a></li>
                    <li><a href="#">마지막으로</a></li> -->
                </ul>
            </div>
        </div>
        <!-- //board__inner -->

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->


</body>
</html>