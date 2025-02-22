<?php
require("db.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Manufacturing System</title>
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

        /* Navigation Links Section */
        .nav-links {
            text-align: center;
            margin-top: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #00796b; /* Matching Green color */
            font-size: 20px;
            margin: 0 20px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #e0f2f1; /* Light Teal background */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #00796b;
            color: white;
        }

        /* Icon Styling */
        .nav-links a i {
            margin-right: 8px; /* Space between icon and text */
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
        <h1>Manufacturing ERP System</h1>
        <p>Welcome to the most efficient ERP system for manufacturing businesses!</p>
    </header>

    <!-- Navigation Links Section -->
    <div class="nav-links">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 ERP Manufacturing System | All Rights Reserved</p>
    </footer>

</body>
</html>
