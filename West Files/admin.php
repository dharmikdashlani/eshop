<?php
	session_start();
	if (!isset($_SESSION['AdminLoginId'])) {
		header("location: loginpage.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./admin.css">
	<title>Admin | Dashbord</title>
	<style type="text/css">
		.btn{
			background: blue;
			height: 40px;
			width: 90px;
			margin-left:10px;
		}
	</style>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['AdminLoginId']?></h1>
	<form method="post" class="mb-3">
		<ul>
			<li><a>Dashbord</a></li>
			<li><a>Add product</a></li>
			<li><a>mange user</a></li>
			<li><a>Dashbord</a></li>
		</ul>
	<button class="btn" name="logout" value="logout button" type="submit">Log out</button>
	</form>
	<?php
		if (isset($_POST['logout'])) {
			session_destroy();
			header("location: loginpage.php");
		}
	?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>