<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to fetch the user data
    $sql = "SELECT * FROM users WHERE name = '".$name."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user details from database
        $user = mysqli_fetch_assoc($result);
        
        // Verify password using password_verify() since the password in the database is hashed
        if (password_verify($password, $user['password'])) {
            // Successful login, set success message and redirect flag
            $_SESSION['message'] = "<div class='alert success'>Login Successful. Redirecting...</div>";

            // We don't redirect yet. We will do it with JavaScript after displaying the message.
            $redirect = true;  // Set a flag to handle JavaScript redirection after message display

            // Set session variables to store user information (for later use in protected pages)
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['user_name'] = $user['name']; // Store user name in session

        } else {
            // Incorrect password, set error message
            $_SESSION['message'] = "<div class='alert error'>Name or Password is wrong</div>";
            $redirect = false;
        }
    } else {
        // User not found, set error message
        $_SESSION['message'] = "<div class='alert error'>Name or Password is wrong</div>";
        $redirect = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Horizon:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        /* Styling for the alerts */
        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="my_form">
    <h2>WELCOME BACK</h2>
    <form action="" method="POST">

        <div class="input_design">
            <input type="text" name="name" placeholder="" required>
            <label for="name" class="floating-label">Name</label>
        </div>

        <div class="input_design">
            <input type="password" name="password" placeholder="" required>
            <label for="password" class="floating-label">Password</label>
        </div>

        <!-- Display success/error messages below the input fields -->
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message']; // Show the message
            unset($_SESSION['message']); // Clear the message after it is displayed
        }
        ?>

        <div class="login">
            <input type="submit" name="login" value="LOG IN"> 
        </div>
        <div class="acc">
            <p style="color: white;">Don't have an account? <a href="registration.php" style="color: #FFB800;">REGISTER</a></p>
        </div>
    </form>
</div>

<script>
    <?php
    // Only execute the JavaScript redirection if the login was successful
    if (isset($redirect) && $redirect) {
        echo "
        setTimeout(function() {
            window.location.href = '../home/admin.php'; // Redirect after message
        }, 2000); // 2-second delay before redirect
        ";
    }
    ?>
</script>

</body>
</html>
