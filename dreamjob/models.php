<?php
class SoftwareEngineer {
    private $conn;
    private $table_name = "software_engineers";

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $hire_date;
    public $experience_years;
    public $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all software engineers
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        
        // Prepare query
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Check if any rows are returned
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            // If no data, return null or handle accordingly
            return null;
        }
    }
}
?>
