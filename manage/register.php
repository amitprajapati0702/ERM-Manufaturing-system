<?php
require("db.php");

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hash the password
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];

    // Insert the data into the database
    $sql = "INSERT INTO `register` (`Fname`, `Lname`, `username`, `password`, `email`, `Mno`, `date`) 
            VALUES ('$fname', '$lname', '$username', '$password', '$email', '$mobileno', CURRENT_TIMESTAMP())";

    if ($con->query($sql)) {
        echo "<script>alert('Data inserted successfully')</script>";
        // Redirect to login page after successful registration
        header("Location: login.php");
        
    } else {
        echo "<script>alert('Data not inserted successfully')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ERP Manufacturing System</title>
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

        /* Register Form Section */
        .register-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            text-align: center;
            color: #00796b;
        }

        .form-group {
            margin-bottom: 20px;
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

        .btn-register {
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

        .btn-register:hover {
            background-color: #004d40;
        }

        footer {
            background-color: #00796b; /* Dark Green Footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            height: 40px;
            bottom: 0;
        }
        /* Register Button Styles */
        .btn-register {
            background-color: #00796b; /* Dark Green */
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            width: 100%; /* Full-width button */
            margin-top: 20px;
        }

        /* Hover effect for Register Button */
        .btn-register:hover {
            background-color: #004d40; /* Darker Green on hover */
        }

        /* Login Link Styles */
        .login-link {
            color: #00796b;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link:hover {
            color: #004d40; /* Darker Green when hovered */
            text-decoration: underline;
        }

        /* Optional: Center the entire Register Section */
        .register-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 50px;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>ERP Manufacturing System</h1>
        <p>Register to start using the system</p>
    </header>

    <!-- Register Form Section -->
    <div class="register-container">
        <h2>Create Account</h2>
        <form action="register.php" method="POST">
            <!-- First Name -->
            <div class="form-group">
                <label for="firstname"><i class="fas fa-user"></i> First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
            </div>
            
            <!-- Last Name -->
            <div class="form-group">
                <label for="lastname"><i class="fas fa-user"></i> Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
            </div>
            
            <!-- Username -->
            <div class="form-group">
                <label for="username"><i class="fas fa-user-tag"></i> Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Mobile Number -->
            <div class="form-group">
                <label for="mobileno"><i class="fas fa-phone"></i> Mobile Number</label>
                <input type="tel" id="mobileno" name="mobileno" placeholder="Enter your mobile number" required>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn-register">Register</button>

            <p>Already Registered? <a href="login.php" class="login-link">Login here</a></p>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 ERP Manufacturing System | All Rights Reserved</p>
    </footer>

</body>
</html>
