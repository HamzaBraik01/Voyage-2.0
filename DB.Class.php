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
    public function getTotalUsers() {
        // Count only users with role 'Client' (id_role = 3)
        $stmt = $this->conn->query("SELECT COUNT(*) AS total_users FROM `user` WHERE `id_role` = 3 AND `etat` = 'actif'");
        $result = $stmt->fetch();
        return $result['total_users'];
    }

    public function getTotalReservations() {
        $stmt = $this->conn->query("SELECT COUNT(*) AS total_reservations FROM `reservation` WHERE `statut` = 'confirmée'");
        $result = $stmt->fetch();
        return $result['total_reservations'];
    }

    public function getTotalActivities() {
        $stmt = $this->conn->query("SELECT COUNT(*) AS total_activities FROM `activite`");
        $result = $stmt->fetch();
        return $result['total_activities'];
    }
}

// Test the connection
$db = new Database();
$conn = $db->getConnection();
?>