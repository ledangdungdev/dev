<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #34495e">
	<div id="main-wrapper">
		<center><h2>HOME</h2>
			<h3>Chào mừng <?php echo $_SESSION['username'] ?> đến với hệ thống</h3>
			<img src="resources/avatar-default-icon.png" class="avatar"/>
		</center>
		<form class="ldd_form" action="homepage.php" method="post">
			<input name="dangxuat" type="submit" id="logout_btn" value="Đăng Xuất"><br>
		</form>
		<?php 
			if(isset($_POST['dangxuat']))
			{
				session_destroy();
				header('location: index.php');
			}
		 ?>
	</div>
</body>
</html>