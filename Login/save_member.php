<?php
	date_default_timezone_set('Asia/Seoul');

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$date = date("Y-m-d H:i:s");
	$hashed_pw = md5($pw); // 비밀번호를 암호화한 값을 저장

	// 이후에 $hashed_pw를 사용하면 됩니다.
?>
