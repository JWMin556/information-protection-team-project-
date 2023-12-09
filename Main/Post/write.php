<?php
	//글 작성
	$con = mysqli_connect("localhost","root","wnddnjs1","login") or die ("Can't access DB");
	session_start();
	$select = "select * from board where Name='$Name'";
	$result=mysqli_query($con,$select);
    //total은 열 개수
	if(mysqli_num_rows($result)==1)
	{
		$rows = mysqli_fetch_array($result);
		//echo "hi";
	}
	if(!$_SESSION['user_name'])
	{?>
		<script>
			alert("<?php echo "접근 권한이 없습니다.\n로그인 후 이용해 주세요."?>");
			location.replace("../Main/main.php");
		</script>
<?php
	}
?>

<!DOCTYPE html>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
         table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
</style>

<body>
        <form method = "post" action = "write_action.php" class="view_table" enctype="multipart/form-data">
        <table  style="padding-top:50px" align = center width=600 border=0 cellpadding=2 >
			<colgroup>
			   <col width="33%" />
			   <col width="63%" />
			  
   			</colgroup>

                <tr>
                	<td height=20 align= center bgcolor=#ccc style="background-color: #648CFF;"><font color=white> 글쓰기</font></td>
                </tr>
                <tr>
                	<td bgcolor=white>
                	<table class = "table2">
					
					<tr>
                        <td>작성자</td>
                        <td><input type = text name = 'Name' value = '<?php echo $rows['Name'] ?>' size=20> </td>
                    </tr>
 
                    <tr>
                        <td>제목</td>
                        <td><input type = text name = 'Title' size=60></td>
                    </tr>
 
                    <tr>
                        <td>내용</td>
                        <td><textarea name = 'Content' cols=85 rows=15></textarea></td>
                    </tr>


                    <tr>
                        <td>비밀번호</td>
                        <td><input type = password name = 'Pw' size=10 maxlength=10></td>
                    </tr>
					
                        </table>
 
                        <center>
                            <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        </form>
</body>
</html>
