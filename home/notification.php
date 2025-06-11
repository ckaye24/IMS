<?php
include 'db.php'; // Include the database connection

// Include the PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// This loads Composer's autoloader
require '../vendor/autoload.php';  // If notification.php is in "home" subdirectory

// Email configuration
$to = 'venusgalert@gmail.com'; // Admin email address
$subject_low = 'Low Stock Alert';
$subject_over = 'Overstock Alert';

// Define thresholds
$low_stock_threshold = 10; // Low stock threshold
$overstock_threshold = 150; // Overstock threshold

// Function to send email notifications
function notifyAdmin($subject, $message) {
    global $to;  // Declare global $to variable inside the function

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);  // true enables exceptions

    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to Gmail
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'venusgalert@gmail.com'; // Your Gmail address
        $mail->Password = 'ouzowuqavtrgarhc'; // Your Gmail password or App Password (if using 2FA)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to (587 is the recommended port for Gmail with TLS)

        // Recipients
        $mail->setFrom('venusgalert@gmail.com', 'Venus Grocery'); // Sender's email
        $mail->addAddress($to); // Add recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject; // Set the subject
        $mail->Body    = $message; // Set the message body

        // Send the email
        $mail->send(); 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to check inventory and return notifications
function checkInventory($conn) {
    global $low_stock_threshold, $overstock_threshold, $subject_low, $subject_over;  // Declare global variables here
    $notifications = [];

    $sql = "SELECT id, product_name, quantity_of_product FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $product_name = $row['product_name'];
            $quantity_of_product = $row['quantity_of_product'];

            if ($quantity_of_product < $low_stock_threshold) {
                $message = "The stock for $product_name (ID: $id) is low ($quantity_of_product). Please restock.";
                notifyAdmin($subject_low, $message);
                $notifications[] = ['type' => 'low-stock', 'message' => $message];
            } elseif ($quantity_of_product > $overstock_threshold) {
                $message = "The stock for $product_name (ID: $id) is overstocked ($quantity_of_product). Please review the inventory.";
                notifyAdmin($subject_over, $message);
                $notifications[] = ['type' => 'overstock', 'message' => $message];
            }
        }
    }

    return $notifications; // Return notifications array
}

// Trigger the inventory check and get notifications
$notifications = checkInventory($conn);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/notification.css">
    <title>Inventory Notifications</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
   
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
        <li><a href="admin.php" class="home" target="_self"><i class="fas fa-home"></i>Home </a></li>
        <li><a href="view_products.php" class="home" target="_self"><i class="fas fa-box"></i>View Products</a></li>
        <li><a href="dashboard.php" class="home"><i class="fas fa-chart-line"></i>Stock Reports</a></li>
        <li><a href="../home/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
        </ul>
    </nav>
</header>


<div class="title">
<h1>Inventory <span class="highlight">Notifications</span></h1>
    <div class="notif">
        <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $notification): ?>
                <div class="notification-box <?php echo $notification['type']; ?>">
                    <h2><?php echo ucfirst(str_replace('-', ' ', $notification['type'])); ?></h2>
                    <p><?php echo htmlspecialchars($notification['message']); ?></p>
                    <button class="close-btn" onclick="this.parentElement.style.display='none';">×</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No inventory alerts at this time.</p>
        <?php endif; ?>
    </div>
</div>


</body>
</html>
