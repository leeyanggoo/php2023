<?php
    include "../connect/session.php";
    include "../connect/connect.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>

    <link rel="stylesheet" href="../html/assets/css/style.css">

</head>
<body>

    <div class="login__wrap">
        <?php
        
        // 이메일, 이름, 닉네임, 비밀번호, 연락처 성별
            // $userID = $_POST['youID'];
            $userEmail = $_POST['userEmail'];
            $userName = $_POST['userName'];
            $userNickname = $_POST['userNickname'];
            $userPass = $_POST['userPass'];
            $userPhone = $_POST['userPhone'];
            $userGender = $_POST['userGender'];
            $userRegTime = time();

            // $usersex = $_POST['choice1'];
            // echo $userEmail, $userName, $userNic, $userPass, $userPhon;

            // $userID = $connect -> real_escape_string(trim($userID));
            $userName = $connect -> real_escape_string(trim($userName));
            $userEmail = $connect -> real_escape_string(trim($userEmail));
            $userPass = $connect -> real_escape_string(trim($userPass));
            // $userPass = password_hash($userPass, PASSWORD_DEFAULT);
            
            // 회원가입
            $sql = "INSERT INTO userMembers(userEmail, userName, userNickname, userPass, userPhone, userGender, userRegTime) VALUES('$userEmail', '$userName', '$userNickname', '$userPass', '$userPhone', '$userGender', '$userRegTime')";
            $result = $connect -> query($sql);
            // echo $sql;
            if($result){
                echo ("
                    <div class='login__title'>
                        <div class='login__logo'>
                            <img src='../html/assets/img/logo.png' alt='헬드백'>
                        </div>
                    </div>        
                    <div class='login__end'>
                        <h2>WELCOME</h2>
                        <span class='desc'>회원가입이 완료되었습니다.<br>
                            감사합니다.</span>
                    </div>  
                    <a href='../main/main.php' class='btnStyle atag'>메인</a>
                ");
                exit;
            } else {
                echo ("
                <div class='login__title'>
                    <div class='login__logo'>
                        <img src='../html/assets/img/logo.png' alt='헬드백'>
                    </div>
                </div>        
                <div class='login__end'>
                    <h2>WELCOME</h2>
                    <span class='desc'>회원 정보가 잘못입력되었습니다.<br>
                        다시 입력해주세요.</span>
                </div>  
                <a href='../join/joinend.php' class='btnStyle atag'>회원 가입</a>
            ");
                exit;
            }
        ?>  
    </div>
                
</body>
</html>