<?php
	include '../config/db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./loginpage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<link rel="icon" type="icon" href="./favicon.png">
	<title>Admin | Login</title>
</head>
<body>	
<form action="" method="post" class="main">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <div>
    <input type="text" placeholder="Enter Username" name="uname">	
    </div>
        <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass">

    <button type="submit" name="admin_login_btn">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <label>
    	&nbsp&nbsp<span class="psw">Forgot <a href="#">password?</a></span>
    </label>
  </div>
</form>
<?php
	if (isset($_POST['admin_login_btn'])) {
		$new_query = "SELECT * FROM `admin` WHERE `user` = '$_POST[uname]' AND `password` = '$_POST[pass]' ";
		$result=mysqli_query($con,$new_query);
		if(mysqli_num_rows($result)==1)
		{
			session_start();
			$_SESSION['AdminLoginId']=$_POST['uname'];
			header("location: ../home/ad/index.php");
		}
		else{
			echo"<script>alert('Incorrect Password');</script>";
		}
	}
?>
</body>
</html>