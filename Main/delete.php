<?php
	//글을 삭제하려할 때 비밀번호가 맞는지 확인
	date_default_timezone_set('Asia/Seoul');
	include "../Main/Post/save_post.php";

	$No=$_GET['No'];
	$URL='main.php';
	$con = mysqli_connect("localhost","root","wnddnjs1","login") or die ("Can't access DB");
	$select = "select * from board where No='$No'";
	$result=mysqli_query($con,$select);


	if(mysqli_num_rows($result)==1)
	{
		$rows = mysqli_fetch_array($result);
	}

	session_start();
?>
	<script>
		let pwd=prompt('게시글의 비밀번호를 입력해 주세요.');	
		
		if(pwd!='<?php echo $rows['Pw']?>')
		{
			alert("비밀번호가 틀렸습니다.");
			location.replace("../Main/main.php");
		}
		else if(pwd=='<?php echo $rows['Pw']?>')
		{
			
			alert("<?php echo "잠시만 기다려 주세요."?>");
			
			//$No를 계속 GET으로 보내줌으로써 파일들을 연결
			location.replace("./delete_confirm.php?No=<?php echo $rows['No'] ?>");
		}
		
	</script>	
	
<?php
    mysqli_close($con);
?>
