<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Variable to store messages to show on the form

if (isset($_POST['sign_up'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username already exists
    $sql_check = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        $message = "<div style='color: red;'>Username already taken. Please choose a different name.</div>";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            $message = "<div style='color: green;'>Successfully Signed Up. Redirecting...</div>";
            header("Location: login.php");
            exit();
        } else {
            $message = "<div style='color: red;'>Error occurred during registration. Please try again.</div>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

<div class="my_form">
    <h2>SIGN UP</h2>
    <form action="" method="POST">
        
        <!-- Display messages -->
        <?php if (!empty($message)) { echo $message; } ?>

        <div class="input_design">
            <input type="text" name="name" placeholder="" required>
            <label for="name" class="floating-label">Name</label>
        </div>

        <div class="input_design">
            <input type="password" name="password" placeholder="" required>
            <label for="password" class="floating-label">Password</label>
        </div>

        <div class="login">
            <input type="submit" name="sign_up" value="Sign Up">
        </div>

        <div class="acc">
            <p style="color: white;">Already have an account? <a href="login.php" style="color: #FFB800;">LOG IN</a></p>
        </div>
    </form>
</div>

</body>
</html>
