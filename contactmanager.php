<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            background: linear-gradient(135deg, #1a237e, #6a1b9a); 
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 450px;
            text-align: center;
        }
        h1 {
            margin-bottom: 10px;
            color: #333;
        }
        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #007bff;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            width: 100%;
        }
        .box {
            padding: 20px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            transition: background 0.3s ease;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>CONTACT MANAGEMENT</h1>

        
        <div class="profile">
            <img src="profile.jpg" alt="Profile Picture">
        </div>

        <div class="grid">
            <a href="http://localhost/addcontact.php" class="box">Add Contact</a>
            <a href="http://localhost/viewcontacts.php" class="box">View Contacts</a>
            <a href="http://localhost/deletecontacts.php" class="box">Delete Contact</a>
            <a href="http://localhost/updatecontacts.php" class="box">Update Contact</a>
        </div>
    </div>

</body>
</html>
