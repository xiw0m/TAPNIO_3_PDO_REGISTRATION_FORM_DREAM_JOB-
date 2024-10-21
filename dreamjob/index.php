<?php
require 'dbConfig.php';
require 'models.php';


$database = new Database();
$db = $database->getConnection();
$engineer = new SoftwareEngineer($db);


// Fetch all software engineers
$results = $engineer->readAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software Engineer List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* Gradient background */
        color: #333;
        margin: 0;
        padding: 20px;
    }


    h1 {
        color: #2c3e50;
    }


    h2 {
        color: #2980b9;
    }


    form {
        background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }


    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #34495e;
    }


    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="number"],
    textarea {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }


    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        border-color: #2980b9;
        outline: none;
    }


    input[type="submit"] {
        background-color: #27ae60;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }


    input[type="submit"]:hover {
        background-color: #219653;
    }


    .engineer-list {
        background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }


    .engineer-item {
        margin-bottom: 10px;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .engineer-list {
            width: 100%;
            border-collapse: collapse;
        }

        .engineer-list th, .engineer-list td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .engineer-list th {
            background-color: #f2f2f2;
        }

        .engineer-list button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
</style>


</head>
<body>
    <h1>Software Engineers</h1>
   
    <!-- Form to add a new software engineer -->
    <h2>Add New Software Engineer</h2>
    <form action="handleForms.php" method="post">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" required>


        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" required>


        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>


        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" required>


        <label for="hire_date">Hire Date</label>
        <input type="date" name="hire_date" id="hire_date" required>


        <label for="experience_years">Experience Years</label>
        <input type="number" name="experience_years" id="experience_years" required>


        <label for="address">Address</label>
        <textarea name="address" id="address" required></textarea>


        <input type="submit" name="submit" value="Add Engineer">
    </form>


    <h2>List of Software Engineers</h2>
    <table class="engineer-list">
        <?php
        if ($results !== null) {
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                    echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['hire_date'] . "</td>";
                    echo "<td>" . $row['experience_years'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>";
                    echo "<a href='editSofteng.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>";
                    echo " | <a href='delete.php" . $row['id'] . "' class='delete-btn'>Delete</a>";
                    echo "</td>";
                    echo "</tr>"; 
            }
        } else {
            echo "<tr><td colspan='7'>No software engineers found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
