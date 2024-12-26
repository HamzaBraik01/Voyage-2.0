<?php
class Database {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $db = 'GestionVoyage';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $this->conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            //echo "Connection successful!<br>";
        } catch (PDOException $e) {
            die("Error connecting to the database: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Test the connection
$db = new Database();
$conn = $db->getConnection();
?>