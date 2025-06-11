<?php

date_default_timezone_set('Asia/Manila');

$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");
$date_added = ""; // Initialize the variable


    
if (isset($_POST['add'])) {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $unit_price = $_POST['unit_price'];
    $quantity_of_product = $_POST['quantity_of_product'];
    $total_item_sold = $_POST['total_item_sold'];
    $reorder_level = $_POST['reorder_level'];
    $supplier_name = $_POST['supplier_name'];
    $supplier_contact = $_POST['supplier_contact'];
    $expiration_date = $_POST['expiration_date'];
    
    // Get the current date and time in 12-hour format with AM/PM
    $date_added = date("Y-m-d h:i:s A");

    // Check if the product already exists
    $check_sql = "SELECT * FROM products WHERE product_name = '$product_name'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Product exists, handle the duplication case
        echo "<script>alert('Error: Product \"$product_name\" already exists.');</script>";
    } else {
        // Proceed to insert the new product
        $sql = "INSERT INTO products (product_name, category, unit_price, quantity_of_product, total_item_sold, reorder_level, supplier_name, supplier_contact, expiration_date, date_added) 
        VALUES ('$product_name', '$category', '$unit_price', '$quantity_of_product', '$total_item_sold', '$reorder_level', '$supplier_name', '$supplier_contact', '$expiration_date', '$date_added')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully.');</script>";
            echo "<script>window.location.href='view_products.php';</script>";
            exit(); // Stop further execution
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENUS</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<body>

<header>

     <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i></label>

            <label class="my_logo">
            <img src="../Images/upperlogo.png" alt="Venus Logo">
        </label>
                    
            <ul>
                <li>
                <a href="admin.php" class="home" target="_self">
                    <i class="fas fa-home"></i>Home 
                </a>
                </li>

                <li>
                <a href="view_products.php" class="home" target="_self">
                    <i class="fas fa-box"></i>View Products
                </a>
                </li>

                <li>
                <a href="dashboard.php" class="home">
                    <i class="fas fa-chart-line"></i>Stock Reports
                </a>
                </li>

                <ul>

                <li>
                    <a href="../home/notification.php" class="home" target="_self">
                        <i class="fas fa-bell"></i> 
                    </a>
                </li>


                <li>
                <a href="../home/logout.php" class="logout" target="_self">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
                </li>
                
            </ul>
    </nav>
    </header>   

<form action="" method="POST">
    <legend>VENUS GROCERY INVENTORY MANAGEMENT SYSTEM</legend>
    <div class="user-details">
        <div class="input-box">
            <!--<span class="id">Id No.</span>-->
            <input type="text" placeholder="ID will be generated automatically" id="id" name="id" disabled><br><br>
        </div>
        <div class="input-box">
            <!--<span for="product_name">Product Name:</span>-->
            <input type="text" placeholder="Enter the Product Name" id="product_name" name="product_name"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="category">Category:</span>-->
            <input type="text" placeholder="Enter the product category" id="category" name="category"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="unit_price">Unit Price:</span>-->
            <input type="text" placeholder="Enter the price" id="unit_price" name="unit_price"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="quantity_of_product">Quantity of Product:</span>-->
            <input type="text" placeholder="Enter the quantity of product" id="quantity_of_product" name="quantity_of_product"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="total_item_sold">Total No. of Item Sold:</span>-->
            <input type="text" placeholder="Enter the total number of the item sold" id="total_item_sold" name="total_item_sold"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="reorder_level">Reorder Level:</span>-->
            <input type="text" placeholder="Enter the reorder level of product" id="reorder_level" name="reorder_level"><br><br>
        </div>
        <div class="input-box">
            <!--<span for="supplier_name">Supplier Name:</span>-->
            <input type="text" placeholder="Enter the supplier name" id="supplier_name" name="supplier_name"><br><br>
        </div>
        <div class="input-box">
            <!--<span class="supplier_contact">Supplier Contact:</span>-->
            <input type="number" placeholder="Enter the supplier contact number" id="supplier_contact" name="supplier_contact" ><br><br>
        </div>
        <div class="input-box">
            <span class="expiration_date">Expiration Date:</span>
            <input type="date" placeholder="Enter the expiration date of the product" id="expiration_date" name="expiration_date"><br><br>
        </div>
        
    </div>
    <div class="button-container">
        <input type="submit" name="add" value="Add">
    </div>
</form>
</body>
</html>
