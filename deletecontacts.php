<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "sneha@123";
$database = "contactsmanagement";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameToDelete = trim($_POST["name"]);
    if (!empty($nameToDelete)) {
        $sql = "DELETE FROM contact_information WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nameToDelete);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "<p style='color: green;'>Contact '$nameToDelete' deleted successfully.</p>";
            } else {
                $message = "<p style='color: red;'>No contact found with name '$nameToDelete'.</p>";
            }
        } else {
            $message = "<p style='color: red;'>Error deleting contact.</p>";
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
    <title>Delete Contact</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #add8e6, #d8bfd8); 
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }h1 {
            font-size: 28px;
            color: #000080;
            margin-top: 20px;
        }.container {
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
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #ff0000; 
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
<h1>Contact Management</h1> 
<div class="container">
    <h2>Delete Contact</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Enter contact name to delete" required>
        <button type="submit">Delete Contact</button>
    </form>
    <?php echo $message; ?>
</div>
</body>
</html>
