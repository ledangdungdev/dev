<?php 
require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body style="background-color: #34495e">
	<div id="main-wrapper">
		<center><h2>Đăng ký</h2>
			<img src="resources/avatar-default-icon.png" class="avatar"/>
		</center>


		<form class="ldd_form" action="register.php" method="post">
			<label><b>Tài khoản</b></label><br>
			<input type="text" name="username" class="inputvalues" placeholder="Tài khoản đăng nhập" required><br>
			<label><b>Mật khẩu</b></label><br>
			<input type="password" name="password" class="inputvalues" placeholder="Nhập mật khẩu của bạn" required><br>
			<label><b>Nhập lại mật khẩu</b></label><br>
			<input type="password" name="repassword" class="inputvalues" placeholder="Nhập lại mật khẩu" required><br>
			<input type="submit" name="dangky" id="signup_btn" value="Đăng ký"><br>
			<a href="index.php"><input type="button" name="trolai" id="back_btn" value="Trở lại đăng nhập"></a>
		</form>

		<?php 
		if (isset($_POST['dangky'])) {
				//echo '<script type="text/javascript"> alert("Bạn đã nhấn nút đăng ký") </script>';
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repass   = $_POST['repassword'];
			if ($password == $repass)
			{
				//echo '<script type="text/javascript"> alert("Lỗi Database") </script>';				
				$query = "select * from taikhoan where username = '$username'";
				$query_run = mysqli_query($lddata_connect, $query);
				if (mysqli_num_rows($query_run) > 0) {
					echo '<script type="text/javascript"> alert("Tài khoản tồn tại rồi nhé!") </script>';
				}
				else
				{
					$query = "insert into taikhoan value('', '$username', '$password')";
					$query_run = mysqli_query($lddata_connect, $query);
					if ($query_run)
					{
						echo '<script type="text/javascript"> alert("Đăng ký thành công, mời bạn quay lại đăng nhập!") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}
				}			

			}
			else
			{
				echo '<script type="text/javascript"> alert("Mật khẩu mới và mật khẩu nhập lại không giống nhau!") </script>';
			}
		}
		?>
	</div>
</body>
</html>