<?php
require 'dbConfig.php';
require 'models.php';

$database = new Database();
$db = $database->getConnection();
$engineer = new SoftwareEngineer($db);

// Handle form submissions for create and update
if (isset($_POST['update'])) {
    // Update engineer record
    $engineer->id = $_POST['id'];
    $engineer->first_name = $_POST['first_name'];
    $engineer->last_name = $_POST['last_name'];
    $engineer->email = $_POST['email'];
    $engineer->phone_number = $_POST['phone_number'];
    $engineer->hire_date = $_POST['hire_date'];
    $engineer->experience_years = $_POST['experience_years'];
    $engineer->address = $_POST['address'];

    // Update the engineer record
    $query = "UPDATE software_engineers SET first_name = ?, last_name = ?, email = ?, phone_number = ?, hire_date = ?, experience_years = ?, address = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$engineer->first_name, $engineer->last_name, $engineer->email, $engineer->phone_number, $engineer->hire_date, $engineer->experience_years, $engineer->address, $engineer->id]);

    header("Location: index.php");
} elseif (isset($_POST['submit'])) {
    // Create a new engineer record
    $engineer->first_name = $_POST['first_name'];
    $engineer->last_name = $_POST['last_name'];
    $engineer->email = $_POST['email'];
    $engineer->phone_number = $_POST['phone_number'];
    $engineer->hire_date = $_POST['hire_date'];
    $engineer->experience_years = $_POST['experience_years'];
    $engineer->address = $_POST['address'];

    // Insert the new engineer record
    $query = "INSERT INTO software_engineers (first_name, last_name, email, phone_number, hire_date, experience_years, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$engineer->first_name, $engineer->last_name, $engineer->email, $engineer->phone_number, $engineer->hire_date, $engineer->experience_years, $engineer->address]);

    header("Location: index.php");
}
?>
