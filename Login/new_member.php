<?php 
	include "./save_member.php";
	
	$con = mysqli_connect("localhost","root","wnddnjs1","login") or die ("Can't access DB");
	$select = "SELECT * FROM member_info";
	$table=mysqli_query($con,$select);
	$sql = mysqli_query($con, "insert into member_info (id,pw,name,email,date) values('".$id."','".$pw."','".$name."','".$email."','".$date."')");

	if($sql)
	{?>
		<script>
			alert('회원가입이 완료되었습니다.');
			location.href="..";
		</script>
	<?php
	}
	else
	{?>
		<script>
		alert('회원가입에 실패했습니다.\n다시 시도해 주세요.');
		location.href="..";
		</script>
	<?php
	}
	?>

	
	<meta charset="utf-8">
	
	<meta http-equiv="refresh">

