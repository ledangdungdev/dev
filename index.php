<?php 
session_start();
require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #34495e">
	<div id="main-wrapper">
		<center><h2>Đăng nhập hệ thống</h2>
			<img src="resources/avatar-default-icon.png" class="avatar"/>
		</center>


		<form class="ldd_form" action="index.php" method="post">
			<label><b>Tài khoản</b></label><br>
			<input type="text" name="username" class="inputvalues" placeholder="Nhập tài khoản của bạn"><br>
			<label><b>Mật khẩu</b></label><br>
			<input type="password" name="password" class="inputvalues" placeholder="Nhập mật khẩu của bạn"><br>
			<input name="dangnhap" type="submit" id="login_btn" value="Đăng nhập"><br>
			<a href="register.php"><input type="button" id="register_btn" value="Đăng kí"></a>
		</form>
		<?php 
			if (isset($_POST['dangnhap'])) 
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query = "select * from taikhoan where username='$username' and password='$password'";
				$query_run = mysqli_query($lddata_connect, $query);
				if (mysqli_num_rows($query_run) > 0)
				{
					//đăng nhập thành công
					$_SESSION['username'] = $username;
					header('location: homepage.php');
				}
				else
				{
					//đăng nhập fail
					echo '<script type="text/javascript"> alert("Bạn đã nhập sai tài khoản hoặc mật khẩu!") </script>';
				}
			}

	    ?>
	</div>
</body>
</html>