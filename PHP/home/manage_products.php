<?php
include '../config/db_conn.php';
?>
<?php
	// session_start();
	// if (!isset($_SESSION['AdminLoginId'])) {
	// 	header("location: ./loginpage.php");
	// }
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
                <li><a class="list-group-item active list-group-item-primary" aria-current="true" href="#">Manage Products</a></li>
                <li ><a href="./user_management.php">Add Users</a></li>
                <li><a href="./display_user.php">Manage User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <form method="post">
               &nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-danger" name="logout" value="logout button" type="submit">Log out</button>
            </form>
        </nav>


        <!-- Content -->
    

    <div class="content">
        <h1>Manage Products</h1>

        <table  class="table table-striped table table-bordered border-primary">
    <thead>
        <th scope="col">first name</th>
        <th scope="col">last name</th>
        <th scope="col">e-mail</th>
        <th scope="col">address</th>
        <th scope="col">pincode</th>
        <th scope="col">city</th>
        <th scope="col">state</th>
        <th colspan="2">actions</th>
    </thead>   

    <?php
        $query="select * from customer";
        $data=mysqli_query($con,$query);    
        $result=mysqli_num_rows($data);
        if($result){

            while($row=mysqli_fetch_array($data)){
                ?>
                <tbody>
                <tr>
                    <td>
                        <?php
                            echo $row['fname'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['lname'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['email'];
                        ?>
                    </td>
                    
                    <td>
                        <?php
                            echo $row['full_address'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['pincode'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['city'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['state'];
                        ?>
                    </td>
                    
                    <!-- <td><a href="update.php?id=
                        <?php
                            // echo $row['id'];
                        ?>">edit</a>
                    </td> -->
                    <td>
                        <a class="btn btn-outline-danger" role="button"
                         href="./delete_user.php?id=
                            <?php echo $row['id'];
                            ?>">delete
                         </a>
                    </td>
                </tr>
            </tbody>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <td>no recoud found</td>
            </tr>

                <?php
        }
    ?>
</table>
    <script src="script.js"></script>
    <?php
		// if (isset($_POST['logout'])) {
		// 	session_destroy();
		// 	header("location: ../loginpage.php");
		// }
	?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    </body>
</html>