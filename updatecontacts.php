<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "sneha@123";
$database = "contactsmanagement";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameToUpdate = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $company = trim($_POST["company"]);
    $job_title = trim($_POST["job_title"]);
    $website = trim($_POST["website"]);
    if (!empty($nameToUpdate)) {
       
        $sql = "UPDATE contact_information 
                SET email = ?, phone = ?, address = ?, company = ?, job_title = ?, website = ? 
                WHERE name = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $email, $phone, $address, $company, $job_title, $website, $nameToUpdate);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "<p style='color: green;'>Contact '$nameToUpdate' updated successfully.</p>";
            } else {
                $message = "<p style='color: red;'>No contact found with name '$nameToUpdate'.</p>";
            }
        } else {
            $message = "<p style='color: red;'>Error updating contact.</p>";
        }

        $stmt->close();
    } else {
        $message = "<p style='color: red;'>Please enter a name.</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #add8e6, #d8bfd8); 
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        h1 {
            font-size: 28px;
            color: #000080; 
            margin-top: 20px;
        }
         .container {
            width: 50%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            margin-top: 50px; 
        }
        h2 {
            color: #0000ff; 
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="url"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #008000; 
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>

<h1>Contact Management</h1> 
<div class="container">
    <h2>Update Contact</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Enter contact name to update" required>
        <input type="email" name="email" placeholder="Enter new email">
        <input type="tel" name="phone" placeholder="Enter new phone number">
        <input type="text" name="address" placeholder="Enter new address">
        <input type="text" name="company" placeholder="Enter new company">
        <input type="text" name="job_title" placeholder="Enter new job title">
        <input type="text" name="website" placeholder="Enter new website">
        <button type="submit">Update Contact</button>
    </form>
    <?php echo $message; ?>
</div>

</body>
</html>
