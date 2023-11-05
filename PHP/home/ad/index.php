<?php
	session_start();
	if (!isset($_SESSION['AdminLoginId'])) {
		header("location: ../loginpage.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        ul li a:hover {
            background-color: #434444s;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" style="background-color: #4027ff;">
            <div class="logo">
                <img src="../favicon.png" alt="Admin Logo">
                
            </div>
            <ul class="list-group" >
                <li><a class="list-group-item active list-group-item-primary" aria-current="true" href="#">Dashboard</a></li>
                <li><a href="../product_management.php">Add Products</a></li>
                <li><a href="#">Manage Products</a></li>
                <li><a href="../user_management.php">Add Users</a></li>
                <li><a href="../display_user.php">Manage User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <form method="post">
               &nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-danger" name="logout" value="logout button" type="submit">Log out</button>
            </form>
        </nav>


        <!-- Content -->
    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['AdminLoginId']?></h1>
           
    </div>

    <?php
        if (isset($_POST['save_btn'])) {
            $user=$_POST['username'];
            $lname=$_POST['lastname'];
            $mail=$_POST['mail'];
            $pass=$_POST['pass'];
            $add=$_POST['add'];
            $pincode=$_POST['Pincode'];
            $city=$_POST['city'];
            $state=$_POST['state'];

            $query="INSERT INTO customer (fname,lname,email,password,full_address,pincode,city,state) VALUES('$user','$lname','$mail','$pass','$add','$pincode','$city','$state')";
        $data=mysqli_query($con,$query);
        }
    ?>

    <script src="script.js"></script>
    <?php
		if (isset($_POST['logout'])) {
			session_destroy();
			header("location: ../loginpage.php");
		}
	?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>


<!-- <label for="file">Choose a Photo of product:</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .pdf" required> -->
