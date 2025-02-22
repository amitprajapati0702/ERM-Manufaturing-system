<?php
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Prepare the SQL query to fetch user by username
    $sql = "SELECT * FROM `register` ";
    $result = $con->query($sql);
    if($result){
        if($result->num_rows>0){
            echo("<script>alert('Login Successfully')</script>");
         header("Location:main.php");

           
        }else{
            echo"<script>alert('Invalid user')</script>";
        }
    }
    
 

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ERP Manufacturing System</title>
    <!-- Add Font Awesome for vector icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Reset some default styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Set background color and text color */
        body {
            background-color: #f4f7f6; /* Light background */
            color: #333; /* Dark text */
            font-size: 16px;
            line-height: 1.6;
        }

        /* Header Section */
        header {
            background-color: #00796b; /* Dark Green */
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        header p {
            font-size: 18px;
            margin-top: 5px;
        }

        /* Login Form Section */
        .login-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            color: #00796b;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-size: 16px;
            color: #00796b;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
        }

        .form-group input:focus {
            border-color: #00796b;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #00796b;
        }

        .form-group input {
            padding-left: 40px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #004d40;
        }

        footer {
            background-color: #00796b; /* Dark Green Footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>ERP Manufacturing System</h1>
        <p>Login to access the system</p>
    </header>

    <!-- Login Form Section -->
    <div class="login-container">
        <h2>Login</h2>
        <form action="#" method="POST">
            <!-- Username -->
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 ERP Manufacturing System | All Rights Reserved</p>
    </footer>

</body>
</html>
