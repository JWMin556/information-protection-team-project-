<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Colony 칼럼 로그인</title>
    <link rel="stylesheet" href="./index_style.css" />
  </head>
  <body>
	  <form method="post" action = "Login/login_check.php" name="form">
		<div class="main-container">
		  <header class="logo">
			<div>
			  <img class="logoPicture" src="kau.jpg" alt="항공대 로고" width=280px, height=100px/>
			</div>
		  </header>
		  <content class="login-container">
			<input type="text" placeholder = "아이디" name = "id"><br>
			<input type="password" placeholder = "비밀번호" name = "pw">
		 	<input type="submit" value="로그인" class="loginBtn" style="font-weight : bold ; color: white;">	
		  </content>
		  <footer>아이디가 없다면?  <a href='./Login/sign_up.php'>회원가입하러 가기!</a></footer>
		</div>
		<script src="js/login.js"></script>
	  </form>
  </body>
</html>
