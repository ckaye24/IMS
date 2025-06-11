
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
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
                <a href="../home/logout.php" class="logout" target="_self">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
                </li>
                
            </ul>
    </nav>
    </header>    


    <div class="ad_dash">
        <h1>
        <span class="black">Admin</span>
        <span class="red"> Dashboard</span> 

        </h1>
    </div>
    <div class="container">
        
        <a class="card" href="../home/home.php" target="_self" title="Add New Products">
            <i class="fas fa-plus-circle user-icon"></i>
            <h3>Add Products</h3>
            <p>Add new items to the inventory.</p>
        </a>

        <a class="card" href="view_products.php" target="_self" title="View All Products">
            <i class="fas fa-box-open user-icon"></i>
            <h3>View Products</h3>
            <p>See all available products.</p>
        </a>

        <a class="card" href="dashboard.php" target="_self" title="Stock Reports">
            <i class="fas fa-chart-line user-icon"></i>
            <h3>Stock Reports</h3>
            <p>Manage your stock levels.</p>
        </a>
      
        <a class="card" href="../home/notification.php" target="_self" title="Notification">
            <i class="fas fa-bell user-icon"></i>
            <h3>Notification</h3>
            <p>Check your stock levels.</p>
        </a>

    </div>



</body>
</html>