<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "sneha@123";
$database = "contactsmanagement";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT name, email, phone, address, company, job_title, website FROM contact_information";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #add8e6, #d8bfd8); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
       
        .container {
            width: 90%;
            max-width: 900px;
            background-color: #ffffff; 
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #0000ff; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0000ff; 
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f0f8ff; 
        }
        tr:nth-child(odd) {
            background-color: #f5e6ff; 
        }
        td a {
            color: #0000ff; 
            text-decoration: none;
            font-weight: bold;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>CONTACT INFORMATION</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Company</th>
            <th>Job Title</th>
            <th>Website</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['company']}</td>
                        <td>{$row['job_title']}</td>
                        <td><a href='{$row['website']}' target='_blank'>{$row['website']}</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>No records found</td></tr>";
        }
		$conn->close();
        ?>
    </table>
</div>
</body>
</html>

