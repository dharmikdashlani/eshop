

<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: ../loginpage.php");
}

// Include the external database connection file
include '../config/db_conn.php';
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
                <li><a  href="./ad/index.php">Dashboard</a></li>
                <li><a class="list-group-item active list-group-item-primary" aria-current="true" href="#">Add Products</a></li>
                <li><a href="#">Manage Products</a></li>
                <li><a href="./user_management.php">Add Users</a></li>
                <li><a href="./display_user.php">Manage User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <form method="post">
               &nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-danger" name="logout" value="logout button" type="submit">Log out</button>
            </form>
        </nav>


        <!-- Content -->

        <div class="content">
    <h1>
           Add Products
        </h1>
            <form action="" method="post" enctype="multipart/form-data">
            <label for="file">Choose a Photo of product:</label>
            <br/>
         <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .pdf" required>
        <br/>&nbsp
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Categories</label>
                    <select class="form-select" name="cate" id="validationCustom04" required>
                    <option selected disabled value="">Choose Categories...</option>
                    <option value="1">T-shirt</option>
                    <option value="2">Pant</option>
                </select> 
              </div>
              <br/>
              <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label">Brand</label>
                <select class="form-select" name="brand" id="validationCustom04" required>
                    <option selected disabled value="">Choose Brand...</option>
                    <option value="1">Tommy Hilfiger</option>
                    <option value="2">Nike</option>
                    <option value="3">Allen Solly</option>
                    <option value="4">Adidas</option>
                    <option value="5">Levi's</option>
                </select> 
      </div>
                    <br/>
                <div class="col-md-4">
                    <label for="exampleInputPassword1" class="form-label">Top-Size</label>
                    <select class="form-select" name="tsize" id="validationCustom04" required>
                    <option selected disabled value="">Choose Size ...</option>
                    <option value="1">S</option>
                    <option value="2">M</option>
                    <option value="6">L</option>
                    <option value="3">XL</option>
                    <option value="4">XXL</option>                    
                    <option value="5">XXXL</option>
                </select> 
              </div>
        <br/>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Bottom-Size</label>
                <select class="form-select" name="bsize" id="validationCustom04" required>
                    <option selected disabled value="">Choose Size...</option>
                    <option value="1">28</option>
                    <option value="2">30</option>
                    <option value="3">32</option>
                    <option value="4">34</option>
                    <option value="5">36</option>
                    <option value="6">38</option>
                    <option value="7">40</option>
                    <option value="8">42</option>
                </select> 
              </div>
            <br/>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Color</label>
                <select class="form-select" name="color" id="validationCustom04" required>
                    <option selected disabled value="">Choose Color...</option>
                    <option value="1">Red</option>
                    <option value="2">Blue</option>
                    <option value="3">Green</option>
                </select>    
            </div>
                <br>
            <div class="mb-3">
                <label class="form-label">Product-Description</label>
                <textarea class="form-control" name="dis" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
  
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Price</label>
                <input type="number" class="form-control" name="Price" id="validationCustom05" required>
            </div>
            <br>

                <button type="submit" name="save_btn" class="btn btn-success">Submit</button>
            </form>
    </div>
    
      <?php
      if (isset($_POST['save_btn'])) {
        // Handle image upload
        $targetDirectory = 'img/';  // Directory where you want to store uploaded images
    
        $uploadedFile = $_FILES['image'];
    
        // Validate file type
        $allowedExtensions = ["jpg", "jpeg", "png"];
        $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
    
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Invalid file type. Allowed types: JPG, JPEG, PNG.";
        } else {
            $newFileName = uniqid() . "." . $fileExtension;  // Create a unique filename
    
            // Move the uploaded image to the target directory
            if (move_uploaded_file($uploadedFile['tmp_name'], $targetDirectory . $newFileName)) {
                echo "Image uploaded successfully.";
    
                // Store the file path in the database
                $product_image = $targetDirectory . $newFileName;
    
                // Continue with the database insertion code
                $categories = $_POST['cate'];
                $brand = $_POST['brand'];
                $topsize = $_POST['tsize'];
                $bottomsize = $_POST['bsize'];
                $color = $_POST['color'];
                $product_description = $_POST['dis'];
                $price = $_POST['Price'];
    

                //INSERT INTO `product` (`product_id`, `product_image`, `categories_id`, `brand_id`, `topsize_id`, `bottomsize_id`, `color_id`, `product_description`, `price`) VALUES 

                // Insert data into the 'product' table, including the image file path
                $query = "INSERT INTO product (product_image, categories_id, brand_id, topsize_id, bottomsize_id, color_id, product_description, price) 
                          VALUES ('$product_image', '$categories', '$brand', '$topsize', '$bottomsize', '$color', '$product_description', '$price')";
    
                if (mysqli_query($con, $query)) {
                    echo "Product added successfully.";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Error uploading image.";
            }
        }
    }
    ?>
    
    
   

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </body>
</html>


