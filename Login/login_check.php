<?php
	// DB 접속
	$con = mysqli_connect("localhost", "root", "wnddnjs1", "login") or die ("Can't access DB");	
	include "./save_member.php";

	if (!$con) {
		echo "<script>
				alert('오류가 발생하였습니다.<br>관리자에게 문의해 주세요.');
				location.replace('..'); 
            </script>";
	}

	// 입력값에 대한 검증
	$list = ['fl', 'la', 'ag', 'echo', 'FL', 'LA', 'AG', 'insert', 'select', 'from', 'where', 'alert', 'script'];
	
	$id_post = $_POST['id'];
	$pw_post = $_POST['pw'];

	// id로 받아온 문자열에 $list의 요소가 포함되어 있을 경우 요청을 거부합니다.
	if (preg_match_all('/' . implode('|', $list) . '/', $id_post)) {
		echo "존재하지 않는 회원입니다. 회원가입 화면으로 넘어갑니다.";
	} else {
		$id = $id_post;
	}

	// pw로 받아온 문자열에 $list의 요소가 포함되어 있을 경우 요청을 거부합니다.
	if (preg_match_all('/' . implode('|', $list) . '/', $pw_post)) {
		echo "존재하지 않는 회원입니다. 회원가입 화면으로 넘어갑니다.";
	} else {
		$pw = $pw_post;
		$hashed_pw = md5($pw); // 비밀번호를 암호화한 값을 저장
	}

	$select = "SELECT * FROM member_info WHERE id='$id'";
	$result = mysqli_query($con, $select);
	
	// 존재하는 id라면 비밀번호를 검사하고 로그인
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result); 
	
		// 비밀번호 일치 => main 페이지로 넘김.
		if ($row['pw'] == $hashed_pw) {
			session_start();
			$_SESSION['user_name'] = $row['name'];
			
			echo "<script>
					alert('로그인 되었습니다.'); // 로그인 되었습니다를 띄우고
					location.replace('../Main/main.php'); // main.jsp로 돌아감
            	</script>";
		} else {
			// 비밀번호가 틀림.	=> 이전 화면으로.
			echo "<script>
					alert('로그인 정보가 일치하지 않습니다.');
					history.back();
				</script>";
		}
	} else {
		// 일치하는 아이디 없음. => 회원가입 화면으로 넘김.
		echo "<script>
				alert('존재하지 않는 회원입니다. 회원가입 화면으로 넘어갑니다.');
				location.replace('./sign_up.php');
			</script>";
	}
?>
