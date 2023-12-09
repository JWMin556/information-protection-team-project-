
<?php
	// include "save_write_variables";

	session_start();
	$con = mysqli_connect("localhost","root","wnddnjs1","login") or die ("Can't access DB");
	
	//board 테이블에서 인덱스 칼럼(No)을 내림차순(desc)으로 가져옴
	$select = "select * from board order by No desc";
	$result=mysqli_query($con,$select);

    //total은 열 개수
	$total = mysqli_num_rows($result);
	// $_SESSION['author']=$row['Name'];
?>

<!DOCTYPE html>

<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>Main Page</title>
		<link rel="stylesheet" href="./main_style.css" />
	</head>

	<body>
		
		<!--환영 메세지-->
		<div align="right"><br>
			<?php
			if(isset($_SESSION['user_name']))
			{

				echo "{$_SESSION['user_name']}님 환영합니다.";
			}
			
			?>
		</div>
		
		<div align="right">

			<div style="display: inline-block">
				<form action="../Login/log_out.php">
					<br><input type="submit" value="로그아웃" class="myButton">
				</form>
			</div>
			<div style="display: inline-block">
				<form method="post" action="./Post/write.php">
					<input type="submit" value="글쓰기" class="myButton">
				</form>
			</div>
		</div>
		
	
		<!--로그아웃/글-->
	<br><br>


<!-- 테이블 시작 -->

		<h2 align=center>Colony Columm</h2>
        <table align = center>
        <thead align = "center" style="background-color: #648CFF;">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">등록일자</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href="./Post/confirm_post.php?No=<?php echo $rows['No'] ?>">
						<?php echo $rows['Title']?>
					</a></td>
                  <td width = "100" align = "center"><?php echo $rows['Name']?></td>
                <td width = "200" align = "center"><?php echo $rows['Date']?></td>
             
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
 
<!-- 테이블 종료 -->

	</body>
</html>
