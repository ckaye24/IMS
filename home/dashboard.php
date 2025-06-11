<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch overstocked and low-stock products
$low_stock_sql = "SELECT * FROM products WHERE quantity_of_product <= 9";
$overstock_sql = "SELECT * FROM products WHERE quantity_of_product >= 150";

$low_stock_result = mysqli_query($conn, $low_stock_sql);
$overstock_result = mysqli_query($conn, $overstock_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Dashboard</title>
    <link rel="stylesheet" href="view.css"> <!-- Link to the same CSS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <li><a href="view_products.php" class="home"><i class="fas fa-eye"></i>View Products</a></li>
         

            <ul><li><a href="../home/notification.php" class="notif" target="_self"><i class="fas fa-bell"></i> </a></li>
           


            <li><a href="../home/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="info">
    <h1>VENUS GROCERY INVENTORY MANAGEMENT SYSTEM</h1>
    <button class="print-btn" onclick="window.print()">Print Report</button>


    <h2>Low Stock Products (Below 10 units)</h2>
    <table>
        <tr>
            <th>Id No.</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Item Sold</th>
            <th>Reorder Level</th>
            <th>Supplier Name</th>
            <th>Supplier Contact</th>
            <th>Expiration Date</th>
            <th>Date Added</th>
           
        </tr>
        <?php if (mysqli_num_rows($low_stock_result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($low_stock_result)): ?>
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
                    
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No low stock products found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <h2>Overstocked Products (Above 150 units)</h2>
    <table>
        <tr>
            <th>Id No.</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Item Sold</th>
            <th>Reorder Level</th>
            <th>Supplier Name</th>
            <th>Supplier Contact</th>
            <th>Expiration Date</th>
            <th>Date Added</th>
            
            
        </tr>
        <?php if (mysqli_num_rows($overstock_result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($overstock_result)): ?>
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

                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No overstocked products found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<?php mysqli_close($conn); ?>

</body>
</html>
