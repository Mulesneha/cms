<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "sneha@123";
$database = "contactsmanagement";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error in connection: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $company = $_POST['company'];
    $job_title = $_POST['job_title'];
    $website = $_POST['website'];
    $query = "INSERT INTO Contact_information (name, email, phone, address, company, job_title, website) 
              VALUES ('$name', '$email', '$phone', '$address', '$company', '$job_title', '$website')";
     if (mysqli_query($conn, $query)) {
        echo "<script>
                setTimeout(function() {
                    alert('Contact added successfully!');
                }, 100);
              </script>";
    } else {
        echo "<script>
                setTimeout(function() {
                    alert('Error: " . mysqli_error($conn) . "');
                }, 100);
              </script>";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add CONTACT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2C3E50, #FF6F61); /* Darker Blue & Deep Coral */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            color: blue;
            font-size: 26px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            font-size: 16px;
        }

        input {
            width: 95%;
            padding: 14px;
            border: 1px solid #aaa;
            border-radius: 6px;
            background: #f5f5f5;
            color: #333;
            font-size: 17px;
        }

        button {
            width: 100%;
            padding: 16px;
            margin-top: 18px;
            border: none;
            border-radius: 6px;
            background: #004080;
            color: white;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        button:hover {
            background: #002b5e;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>CONTACT MANAGEMENT</h1>
        
        <form action="addcontact.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required placeholder="Enter Name">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required placeholder="Enter Email">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" required placeholder="Enter Phone Number">
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required placeholder="Enter Address">
            </div>
            
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" placeholder="Enter Company">
            </div>
            
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" id="job_title" placeholder="Enter Job Title">
            </div>
            
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" placeholder="Enter Website">
            </div>
            
            <button type="submit">Add Contact</button>
        </form>
    </div>

</body>
</html>

