<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle search functionality
$search_value = '';
if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
  
    $sql = "SELECT * FROM products WHERE 
            CONCAT(product_name, category) LIKE '%$search_value%' OR
            quantity_of_product LIKE '%$search_value%' OR
            unit_price LIKE '%$search_value%' OR
            total_item_sold LIKE '%$search_value%' OR
            reorder_level LIKE '%$search_value%' OR
            supplier_name LIKE '%$search_value%' OR
            supplier_contact LIKE '%$search_value%' OR
            expiration_date LIKE '%$search_value%'";
} else {
    $sql = "SELECT * FROM products";
}
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Handle delete functionality
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $del_sql = "DELETE FROM products WHERE id='$id'";

    if (mysqli_query($conn, $del_sql)) {
        // Renumber IDs after deletion
        $sql_renumber = "SET @autoid := 0";
        mysqli_query($conn, $sql_renumber);

        $sql_renumber_update = "UPDATE products SET id = @autoid := (@autoid + 1)";
        if (mysqli_query($conn, $sql_renumber_update) === TRUE) {
            // Optionally echo a success message
            // echo "IDs renumbered successfully.";
        } else {
            echo "Error renumbering IDs: " . mysqli_error($conn);
        }

        // Reset the AUTO_INCREMENT to start from 1
        $sql_reset_auto_increment = "ALTER TABLE products AUTO_INCREMENT = 1";
        if (mysqli_query($conn, $sql_reset_auto_increment) === FALSE) {
            echo "Error resetting AUTO_INCREMENT: " . mysqli_error($conn);
        }

        header("Location: view_products.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW PRODUCTS</title>
    <link rel="stylesheet" href="view.css">
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <style>
        .info h2 {
            color: white;
            margin-top: 20px;
        }
        
        .table-container {
            margin: 20px;
        }

        @media print {
            .print-btn { 
                display: none; 
            }
            header, nav {
                display: none;
            }
        }

        .print-btn {
            padding: 10px 15px;
            border: none;
            background-color: #001aff93; /* Submit button color */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .print-btn:hover {
            background-color: #FFB800; /* Darker background on hover */
            color: black;
        }

        @media print {
            .search_bar {
                display: none !important; /* Hide search bar when printing */
            }

            .del_btn, .upd_btn {
                display: none !important; 
            }

            /* Hide the entire columns for delete and update */
            th:nth-child(12), td:nth-child(12), 
            th:nth-child(13), td:nth-child(13) { 
                display: none !important;
            }

            
        }
    </style>
</head>
<body>

<header>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label class="my_logo">
            <img src="../Images/upperlogo.png" alt="Venus Logo">
        </label>
        <ul>
            <li><a href="admin.php" class="home"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="home.php" class="home"><i class="fas fa-add"></i>Add Product</a></li>
            <li><a href="dashboard.php" class="home"><i class="fas fa-chart-line"></i>Stock Reports</a></li>
            <ul><li><a href="../home/notification.php" class="notif" target="_self"><i class="fas fa-bell"></i> </a></li>

            <li><a href="../home/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="info">
    <h1>VENUS GROCERY INVENTORY MANAGEMENT SYSTEM</h1>
    
    <div class="search_bar">
        <form action="result.php" method="GET">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search_value); ?>" placeholder="Search your products">
            <input type="submit" name="submit" value="Search">
            <button class="print-btn" onclick="window.print()">Print</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Id No.</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Unit Price</th>
            <th>Quantity of Product</th>
            <th>Total Item Sold</th>
            <th>Reorder Level</th>
            <th>Supplier Name</th>
            <th>Supplier Contact</th>
            <th>Expiration Date</th>
            <th>Date Added</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['unit_price']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity_of_product']); ?></td>
                    <td><?php echo htmlspecialchars($row['total_item_sold']); ?></td>
                    <td><?php echo htmlspecialchars($row['reorder_level']); ?></td>
                    <td><?php echo htmlspecialchars($row['supplier_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['supplier_contact']); ?></td>
                    <td><?php echo htmlspecialchars($row['expiration_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                    <td><a class="upd_btn" href="update_product.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a onclick="return confirm('Are you sure to delete this?');" class="del_btn" href="view_products.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="13">No products found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
