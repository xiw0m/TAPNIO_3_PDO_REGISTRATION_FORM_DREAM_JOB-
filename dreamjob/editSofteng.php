<?php
require 'dbConfig.php';
require 'models.php';

$database = new Database();
$db = $database->getConnection();
$engineer = new SoftwareEngineer($db);

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $engineer->id = $_GET['id'];
    
    // Fetch the current record data
    $query = "SELECT * FROM software_engineers WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $engineer->id);
    $stmt->execute();

    // Check if the record exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $engineer->first_name = $row['first_name'];
        $engineer->last_name = $row['last_name'];
        $engineer->email = $row['email'];
        $engineer->phone_number = $row['phone_number'];
        $engineer->hire_date = $row['hire_date'];
        $engineer->experience_years = $row['experience_years'];
        $engineer->address = $row['address'];
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "Invalid ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Software Engineer</title>
</head>
<body>
    <h1>Edit Software Engineer</h1>
    <form action="handleForms.php" method="post">
        <input type="hidden" name="id" value="<?php echo $engineer->id; ?>">
        <input type="text" name="first_name" placeholder="First Name" value="<?php echo $engineer->first_name; ?>" required>
        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $engineer->last_name; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo $engineer->email; ?>" required>
        <input type="text" name="phone_number" placeholder="Phone Number" value="<?php echo $engineer->phone_number; ?>" required>
        <input type="date" name="hire_date" value="<?php echo $engineer->hire_date; ?>" required>
        <input type="number" name="experience_years" placeholder="Experience Years" value="<?php echo $engineer->experience_years; ?>" required>
        <textarea name="address" placeholder="Address"><?php echo $engineer->address; ?></textarea>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
