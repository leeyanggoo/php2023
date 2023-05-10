<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));

    // 기본 (이어서 써야 하는 경우 마지막에 한 칸 띄어씀)
    // $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ";

    // 기본에서 키워드와 조건(제목 / 내용 / 등록자) 추가하기
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";

    // 합치기
    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ";
    switch($searchOption){
        case "title":
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "content":
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
    }

    $result = $connect -> query($sql);

    $totalCount = $result -> num_rows;
    // echo $totalCount;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 결과 게시판</title>

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
            <h2>검색 결과</h2>
            <p class="intro__text">
                웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>총 <em><?=$totalCount?></em>건의 게시물의 검색되었습니다.
            </p>
        </div>
        <!-- //intro__inner -->

        <div class="board__inner">
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
<?php
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql .= "LIMIT {$viewLimit}, {$viewNum}";
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
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목</a></td>
                            <td>이름</td>
                            <td>2023-04-20</td>
                            <td>100</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="board__pages">
                <ul>
<?php
    // 검색된 게시글 개수
    // echo "<script>
    //     document.querySelector('.intro__text > em').innerText = '{$totalCount}';
    // </script>";

    // 총 페이지 개수
    $boardTotalCount = ceil($totalCount / $viewNum);
    
    // 1 2 3 4 5 [6] 7 8 9 10
    $pageView = 4;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 + 마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로 + 이전
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$prevPage}'>이전</a></li>";
        echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page=1'>처음으로</a></li>";
    }

    // 페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active"; // 보고 있는 페이지가 같으면 active라는 문자열 추가

        echo "<li class='{$active}'><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$i}'>{$i}</a></li>";
    }

    // 다음
    // if($page != $boardTotalCount){
    //     $nextPage = $page + 1; 
    //     echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$nextPage}'>다음</a></li>";
    //     echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$boardTotalCount}'>마지막으로</a></li>";
    // }

    if($page > 0 && $page < $boardTotalCount){
        $nextPage = $page + 1;
        echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$nextPage}'>다음</a></li>";
        echo "<li><a href='boardSearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$boardTotalCount}'>마지막으로</a></li>";
    }

    // 게시글이 없을 때?
    // if($page > $boardTotalCount || $page <= 0){
    //     // echo "<script>alert('게시글이 없습니다.');location.href = 'board.php';</script>";
    //     echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
    // }
?>
                </ul>
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
            </div>
        </div>
        <!-- //board__inner -->
    </main>

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
    
</body>
</html>