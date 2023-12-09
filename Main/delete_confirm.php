<?php
    $No = $_GET['No']; // $No를 먼저 정의
    $con = mysqli_connect("localhost", "root", "wnddnjs1", "login") or die ("Can't access DB");

    if (!$con) {
        echo "DB에 접속할 수 없습니다.";
        exit;
    }

    // 비밀번호 확인 후 글 삭제
    $delete_query = "DELETE FROM board WHERE No='$No'";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>
                alert('삭제가 완료되었습니다.');
                location.replace('../Main/main.php');
              </script>";
    } else {
        echo "<script>
                alert('삭제 중 오류가 발생했습니다.');
                history.back();
              </script>";
    }

    // $con을 사용한 후에는 연결을 닫아주는 것이 좋습니다.
    mysqli_close($con);
?>
