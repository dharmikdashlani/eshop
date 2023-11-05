<?php
include '../config/db_conn.php';
?>
<?php
	session_start();
	if (!isset($_SESSION['AdminLoginId'])) {
		header("location: ./loginpage.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./ad/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
        ul li a:hover {
            background-color: #434444;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" style="background-color: #4027ff;">
        <div class="logo">
                <img src="./favicon.png" alt="Admin Logo">
                
            </div>
            <ul class="list-group">
                <li><a href="./ad/index.php">Dashboard</a></li> 
                <li><a href="./product_management.php ">Add Products</a></li>
                <li><a href="#">Manage Products</a></li>
                <li ><a class="list-group-item active list-group-item-primary" aria-current="true"  href="#">Add Users</a></li>
                <li><a href="./display_user.php">Manage User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <form method="post">
               &nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-danger" name="logout" value="logout button" type="submit">Log out</button>
            </form>
        </nav>


        <!-- Content -->
    

        <!-- <div class="register">
        <form action="" method="post">
                <label>Eanter Your First Name</label>
                <input type="text" name="username"></br></br>
                <label>Eanter Your Last Name</label>
                <input type="text" name="lastname"></br></br>
                <label>Eanter Your Email</label>
                <input type="Email" name="mail">
                </br></br>
                <label>Eanter Your Password</label>
                <input type="Password" name="pass"></br></br>
            <label>Eanter Your Address</label>
             <input type="Address" name="add"></br></br>

                <label>Eanter Your Pincode</label>
                <input type="Pincode" name="Pincode"></br></br>

                <label>Eanter Your city</label>
                <input type="city" name="city"></br></br>

                <label>Eanter Your state</label>
                <input type="state" name="state"><br><br>

                <input type="submit" name="save_btn" value="submit">
        </form>
    </div> -->

    <div class="content">
    <h1>
           Add User
        </h1>
            <form action="" method="post">
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>    
                    <input type="text" class="form-control" name="username" name="username" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lastname" id="validationCustom01" value="" required>
                </div>
            
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <div class="col-md-4" >
                    <input  type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                    <br>
                <div class="col-md-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
                </div>
        
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="validationCustom03" required>
            </div>
  
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">State</label>
                <select class="form-select" name="state" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>Gujrat</option>
                    <option>Up</option>
                    <option>Mp</option>
                </select>    
            </div>
                <br>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="add" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
  
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Pincode</label>
                <input type="text" class="form-control" name="Pincode" id="validationCustom05" required>
            </div>
            <br>

                <button type="submit" name="save_btn" class="btn btn-success">Submit</button>
            </form>
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



