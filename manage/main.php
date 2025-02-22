<?php

    require("db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name=$_POST['emp-name'];
        $des=$_POST['emp-designation'];
        $email=$_POST['emp-email'];
        $phone=$_POST['emp-phone'];
        $sql="INSERT INTO `hr` (`id`, `name`, `designation`, `email`, `phone`) VALUES ( 'priya', 'anand', 'this@that.com', '963258741');";
        $result=$con->query($sql);
        if($result){
            echo"<script>alert('data inserted')</script>";
        }else{
            echo"not inserted";
        }
    }

  
// Inventory Module: Insert Inventory Item
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item-name'])) {
    // Get the form data
    $itemName = $_POST['item-name'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];

    // Prepared statement for inserting inventory data
    $stmt = $con->prepare("INSERT INTO `inventory` (`item_name`, `quantity`, `location`) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $itemName, $quantity, $location);  // "sis" means string, integer, string
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Inventory item added successfully')</script>";
    } else {
        echo "<script>alert('Failed to add inventory item')</script>";
    }
    $stmt->close();
}

// Finance Module: Insert Transaction Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['transaction-date'])) {
    // Get the form data
    $transactionDate = $_POST['transaction-date'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    // Prepared statement for inserting finance data
    $stmt = $con->prepare("INSERT INTO `finance` (`transaction_date`, `amount`, `type`) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $transactionDate, $amount, $type);  // "sis" means string, integer, string
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Transaction added successfully')</script>";
    } else {
        echo "<script>alert('Failed to add transaction')</script>";
    }
    $stmt->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System | Dashboard</title>
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

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px 0;
        }

        .nav-menu li {
            list-style: none;
            margin: 15px;
            text-align: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #00796b;
            font-size: 18px;
            display: block;
            padding: 15px;
            border-radius: 8px;
            background-color: #e0f2f1; /* Light Teal background */
            transition: background-color 0.3s ease, color 0.3s ease;
            width: 120px;
        }

        .nav-menu a:hover {
            background-color: #00796b;
            color: white;
        }

        .nav-menu a i {
            font-size: 24px;
            margin-bottom: 8px;
        }

        /* Main Content Section */
        .main-content {
            text-align: center;
            margin-top: 50px;
        }

        /* Dashboard Info Cards */
        .dashboard-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .dashboard-card {
            background-color: white;
            padding: 20px;
            width: 28%;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dashboard-card h3 {
            font-size: 24px;
            color: #00796b;
        }

        .dashboard-card p {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .dashboard-card i {
            font-size: 40px;
            color: #00796b;
        }

        /* Footer */
        footer {
            background-color: #00796b; /* Dark Green Footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            height: 30px;
        }
        /* HR Module Section Styles */
#hr {
    background-color: #ffffff; /* White background */
    padding: 20px;
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

/* Section Title */
#hr h3 {
    font-size: 28px;
    color: #00796b; /* Dark Green */
    margin-bottom: 20px;
}

/* Form Group Styles */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

/* Label Styling */
.form-group label {
    font-size: 18px;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

/* Input Fields Styling */
.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 5px;
}

/* Add Submit Button Styling */
.btn-submit {
    background-color: #00796b; /* Dark Green */
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #004d40; /* Darker Green */
}

/* Input Focus Styling */
.form-group input:focus {
    outline: none;
    border-color: #00796b; /* Highlight border with green */
    box-shadow: 0 0 5px rgba(0, 121, 107, 0.5);
}

/* Font Awesome Icon Styling in Labels */
.form-group label i {
    margin-right: 10px;
    color: #00796b;
}

/* Inventory Module Section Styles */
#inventory {
    background-color: #ffffff; /* White background */
    padding: 20px;
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

/* Section Title */
#inventory h3 {
    font-size: 28px;
    color: #00796b; /* Dark Green */
    margin-bottom: 20px;
}

/* Form Group Styles */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

/* Label Styling */
.form-group label {
    font-size: 18px;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

/* Input Fields Styling */
.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 5px;
}

/* Add Submit Button Styling */
.btn-submit {
    background-color: #00796b; /* Dark Green */
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #004d40; /* Darker Green */
}

/* Input Focus Styling */
.form-group input:focus {
    outline: none;
    border-color: #00796b; /* Highlight border with green */
    box-shadow: 0 0 5px rgba(0, 121, 107, 0.5);
}

/* Font Awesome Icon Styling in Labels */
.form-group label i {
    margin-right: 10px;
    color: #00796b;
}
/* Finance Module Section Styles */
#finance {
    background-color: #ffffff; /* White background */
    padding: 20px;
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

/* Section Title */
#finance h3 {
    font-size: 28px;
    color: #00796b; /* Dark Green */
    margin-bottom: 20px;
}

/* Form Group Styles */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

/* Label Styling */
.form-group label {
    font-size: 18px;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

/* Input Fields Styling */
.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 5px;
}

/* Add Submit Button Styling */
.btn-submit {
    background-color: #00796b; /* Dark Green */
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #004d40; /* Darker Green */
}

/* Input Focus Styling */
.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #00796b; /* Highlight border with green */
    box-shadow: 0 0 5px rgba(0, 121, 107, 0.5);
}

/* Font Awesome Icon Styling in Labels */
.form-group label i {
    margin-right: 10px;
    color: #00796b;
}
/* Production Module Section Styles */
#production {
    background-color: #ffffff; /* White background */
    padding: 20px;
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

/* Section Title */
#production h2 {
    font-size: 30px;
    color: #00796b; /* Dark Green */
    margin-bottom: 20px;
}

/* Info Box Styling */
.info-box {
    background-color: #e0f2f1; /* Light Teal Background */
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Info Box Title */
.info-box h3 {
    font-size: 24px;
    color: #00796b; /* Dark Green */
    margin-bottom: 15px;
}

/* Info Box Text */
.info-box p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

/* General Text Styling */
p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

/* General Styles for Card Layout */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.info-card {
    background-color: #e0f2f1; /* Light Teal Background */
    padding: 20px;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px); /* Hover effect to elevate the card */
}

.info-card h3 {
    font-size: 22px;
    color: #00796b; /* Dark Green */
    margin-bottom: 15px;
}

.info-card p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

/* Section Title */
.module-section h2 {
    font-size: 30px;
    color: #00796b;
    margin-bottom: 20px;
}

.module-section p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
    margin-bottom: 30px;
}/* Header Section */
header {
    background-color: #00796b; /* Dark Green */
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between; /* Aligns the items on the left and right */
    align-items: center;
}

.header-left {
    flex: 1;
}

.header-left h1 {
    margin: 0;
    font-size: 36px;
}

.header-left p {
    font-size: 18px;
    margin-top: 5px;
}

/* Header Right Section (for Logout button) */
.header-right {
    display: flex;
    justify-content: flex-end; /* Aligns the logout button to the right */
}

.logout-btn {
    background-color: #e0f2f1; /* Light Teal */
    color: #00796b; /* Dark Green */
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.3s, color 0.3s;
}

.logout-btn i {
    font-size: 18px;
}

.logout-btn:hover {
    background-color: #00796b; /* Dark Green */
    color: white;
}

.logout-btn:focus {
    outline: none;
}





    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="header-left">
        <h1>ERP Manufacturing System</h1>
        <p>Welcome to the main dashboard of your ERP system</p>
    </div>
    
    <!-- Logout Button on the Right -->
    <div class="header-right">
        <button class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </div>
</header>

<!-- Navigation Menu -->
<ul class="nav-menu">
    <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="#hr"><i class="fas fa-users"></i> HR</a></li>
    <li><a href="#finance"><i class="fas fa-credit-card"></i> Finance</a></li>
    <li><a href="#inventory"><i class="fas fa-cogs"></i> Inventory</a></li>
    <li><a href="#production"><i class="fas fa-industry"></i> Production</a></li>
    <li><a href="#crm"><i class="fas fa-users-cog"></i> CRM</a></li>
    <li><a href="#scm"><i class="fas fa-truck"></i> SCM</a></li>
    <li><a href="#ecommerce"><i class="fas fa-shopping-cart"></i> E-Commerce</a></li>
    <li><a href="#knowledge"><i class="fas fa-book"></i> Knowledge Management</a></li>
</ul>


    <!-- Main Content Section -->
    <div class="main-content">
        <h2>ERP Dashboard Overview</h2>
        <p>Here is an overview of the most important metrics for your business processes:</p>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <!-- HR Card -->
            <div class="dashboard-card">
                <i class="fas fa-users"></i>
                <h3>HR Overview</h3>
                <p><strong>Employees:</strong> 150</p>
                <p><strong>Departments:</strong> 5</p>
            </div>

            <!-- Finance Card -->
            <div class="dashboard-card">
                <i class="fas fa-credit-card"></i>
                <h3>Finance Overview</h3>
                <p><strong>Revenue:</strong> $500,000</p>
                <p><strong>Expenses:</strong> $350,000</p>
                <p><strong>Profit:</strong> $150,000</p>
            </div>

            <!-- Inventory Card -->
            <div class="dashboard-card">
                <i class="fas fa-cogs"></i>
                <h3>Inventory Overview</h3>
                <p><strong>Items in Stock:</strong> 1,200</p>
                <p><strong>Reorder Level:</strong> 300</p>
                <p><strong>Suppliers:</strong> 10</p>
            </div>
        </div>
    </div>
    <!-- CRM Module Section -->
<section id="crm" class="module-section">
    <h2>CRM Module</h2>
    <p>The CRM module helps manage customer interactions, track sales, and improve customer service across your business.</p>
    
    <!-- CRM Cards -->
    <div class="card-container">
        <!-- Customer Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-users"></i> Customer Management</h3>
            <p>Track customer details, maintain contact information, and view interaction histories. The CRM system helps build long-term customer relationships by improving communication and service.</p>
        </div>
        
        <!-- Sales Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-chart-line"></i> Sales Management</h3>
            <p>Manage leads, opportunities, and sales pipelines effectively. Track sales progress and optimize strategies to close deals faster and increase sales revenue.</p>
        </div>
        
        <!-- Customer Support Card -->
        <div class="info-card">
            <h3><i class="fas fa-headset"></i> Customer Support</h3>
            <p>Provide excellent customer support through a unified platform that tracks tickets, complaints, and resolutions. Ensure that all customer issues are addressed promptly and efficiently.</p>
        </div>
        
        <!-- Reporting & Analytics Card -->
        <div class="info-card">
            <h3><i class="fas fa-chart-pie"></i> Reporting & Analytics</h3>
            <p>Gain insights into sales performance, customer satisfaction, and support metrics. Generate reports to make data-driven decisions and enhance business growth.</p>
        </div>
    </div>
</section>
<!-- SCM Module Section -->
<section id="scm" class="module-section">
    <h2>SCM Module</h2>
    <p>The SCM module helps streamline your supply chain, manage supplier relationships, and optimize procurement and distribution processes.</p>
    
    <!-- SCM Cards -->
    <div class="card-container">
        <!-- Supplier Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-truck"></i> Supplier Management</h3>
            <p>Manage supplier details, contracts, and performance metrics. Build stronger supplier relationships and optimize procurement strategies to ensure timely delivery of materials.</p>
        </div>
        
        <!-- Procurement Card -->
        <div class="info-card">
            <h3><i class="fas fa-cart-arrow-down"></i> Procurement</h3>
            <p>Track purchase orders, manage vendor contracts, and ensure that materials are procured at the best prices to maintain cost-efficiency in the supply chain.</p>
        </div>
        
        <!-- Logistics & Distribution Card -->
        <div class="info-card">
            <h3><i class="fas fa-truck-loading"></i> Logistics & Distribution</h3>
            <p>Optimize logistics operations, manage warehousing, and ensure efficient distribution of products to customers. Improve delivery times and reduce costs.</p>
        </div>
        
        <!-- SCM Analytics Card -->
        <div class="info-card">
            <h3><i class="fas fa-chart-bar"></i> SCM Analytics</h3>
            <p>Monitor supply chain performance with real-time analytics. Use insights to improve logistics, procurement, and supplier management processes.</p>
        </div>
    </div>
</section>
<!-- E-Commerce Module Section -->
<section id="ecommerce" class="module-section">
    <h2>E-Commerce Module</h2>
    <p>The E-Commerce module helps manage online store operations, from product listing to order processing and customer management.</p>
    
    <!-- E-Commerce Cards -->
    <div class="card-container">
        <!-- Product Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-cogs"></i> Product Management</h3>
            <p>Easily add, edit, and manage product listings. Track stock levels, prices, and product variations to ensure a seamless shopping experience for customers.</p>
        </div>
        
        <!-- Order Processing Card -->
        <div class="info-card">
            <h3><i class="fas fa-box"></i> Order Processing</h3>
            <p>Automate the order fulfillment process, from order placement to shipping. Keep track of order status, payment processing, and shipping details in real-time.</p>
        </div>
        
        <!-- Customer Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-users"></i> Customer Management</h3>
            <p>Manage customer accounts, order history, and communication. Offer personalized recommendations, discounts, and promotions to improve customer retention.</p>
        </div>
        
        <!-- E-Commerce Analytics Card -->
        <div class="info-card">
            <h3><i class="fas fa-chart-line"></i> E-Commerce Analytics</h3>
            <p>Track sales, website traffic, and conversion rates. Use data insights to optimize marketing strategies, improve product offerings, and boost overall sales performance.</p>
        </div>
    </div>
</section>
<!-- Knowledge Management Module Section -->
<section id="knowledge" class="module-section">
    <h2>Knowledge Management Module</h2>
    <p>The Knowledge Management module centralizes your organization's knowledge base, making it easy for employees to find and share information.</p>
    
    <!-- Knowledge Management Cards -->
    <div class="card-container">
        <!-- Document Management Card -->
        <div class="info-card">
            <h3><i class="fas fa-file-alt"></i> Document Management</h3>
            <p>Store, manage, and share documents securely. Provide easy access to critical resources such as training materials, manuals, and best practices.</p>
        </div>
        
        <!-- Collaboration Tools Card -->
        <div class="info-card">
            <h3><i class="fas fa-users-cog"></i> Collaboration Tools</h3>
            <p>Facilitate team collaboration through forums, chat, and shared workspaces. Ensure all team members can contribute to knowledge sharing and problem-solving.</p>
        </div>
        
        <!-- Searchable Knowledge Base Card -->
        <div class="info-card">
            <h3><i class="fas fa-search"></i> Searchable Knowledge Base</h3>
            <p>Maintain a searchable repository of organizational knowledge. Help employees find solutions quickly and make informed decisions by accessing historical data, case studies, and FAQs.</p>
        </div>
        
        <!-- Knowledge Sharing Card -->
        <div class="info-card">
            <h3><i class="fas fa-share-alt"></i> Knowledge Sharing</h3>
            <p>Encourage employees to contribute their expertise and insights to the knowledge base. Reward knowledge sharing to improve organizational learning and innovation.</p>
        </div>
    </div>
</section>


    <!-- Production Module Section -->
<section id="production" class="module-section">
    <h2>Production Module</h2>
    <p>The Production Module helps you efficiently manage and track production processes, schedules, and resources.</p>
    
    <!-- Static Information - Production Overview -->
    <div class="info-box">
        <h3>Production Overview</h3>
        <p>Track production schedules, manage orders, and monitor the efficiency of the manufacturing process. This module helps ensure that production targets are met on time and with optimal use of resources.</p>
    </div>
    
    <!-- Static Information - Materials Management -->
    <div class="info-box">
        <h3>Materials Management</h3>
        <p>Monitor raw material availability and track inventory levels. Ensure materials are available when needed to avoid delays in production and improve workflow.</p>
    </div>
    
    <!-- Static Information - Scheduling -->
    <div class="info-box">
        <h3>Production Scheduling</h3>
        <p>Efficiently manage production schedules by assigning tasks to specific machines or workstations. Prioritize jobs to ensure timely delivery of goods to clients.</p>
    </div>
    
    <!-- Static Information - Monitoring & Reports -->
    <div class="info-box">
        <h3>Production Monitoring</h3>
        <p>Track production progress, identify bottlenecks, and optimize workflows. Generate real-time reports on production efficiency, downtime, and performance metrics.</p>
    </div>
</section>

        <!-- HR Module Section -->
        <section id="hr" class="form-section">
        <h3>Add New HR Employee</h3>
        <form method="post">
            <div class="form-group">
                <label for="emp-name"><i class="fas fa-user"></i> Employee Name:</label>
                <input type="text" id="emp-name" required>
            </div>
            <div class="form-group">
                <label for="emp-designation"><i class="fas fa-id-badge"></i> Designation:</label>
                <input type="text" id="emp-designation" required>
            </div>
            <div class="form-group">
                <label for="emp-email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="emp-email" required>
            </div>
            <div class="form-group">
                <label for="emp-phone"><i class="fas fa-phone"></i> Phone:</label>
                <input type="tel" id="emp-phone" required>
            </div>
            <input type="submit" value="Add Employee" class="btn-submit">
        </form>
    </section>
      
    <!-- Inventory Module Section -->
    <section id="inventory" class="form-section">
        <h3>Add New Inventory Item</h3>
        <form>
            <div class="form-group">
                <label for="item-name"><i class="fas fa-cogs"></i> Item Name:</label>
                <input type="text" id="item-name" required>
            </div>
            <div class="form-group">
                <label for="quantity"><i class="fas fa-box"></i> Quantity:</label>
                <input type="number" id="quantity" required>
            </div>
            <div class="form-group">
                <label for="location"><i class="fas fa-map-marker-alt"></i> Location:</label>
                <input type="text" id="location" required>
            </div>
            <input type="submit" value="Add Inventory Item" class="btn-submit">
        </form>
    </section>
       <!-- Finance Module Section -->
       <section id="finance" class="form-section">
        <h3>Add New Transaction</h3>
        <form>
            <div class="form-group">
                <label for="transaction-date"><i class="fas fa-calendar-alt"></i> Date:</label>
                <input type="date" id="transaction-date" required>
            </div>
            <div class="form-group">
                <label for="amount"><i class="fas fa-dollar-sign"></i> Amount:</label>
                <input type="number" id="amount" required>
            </div>
            <div class="form-group">
                <label for="type"><i class="fas fa-exchange-alt"></i> Type:</label>
                <select id="type" required>
                    <option value="Revenue">Revenue</option>
                    <option value="Expense">Expense</option>
                </select>
            </div>
            <input type="submit" value="Add Transaction" class="btn-submit">
        </form>
    </section>

    <!-- Footer
    <footer>
        <p>&copy; 2024 ERP Manufacturing System | All Rights Reserved</p>
    </footer> -->

</body>
</html>
