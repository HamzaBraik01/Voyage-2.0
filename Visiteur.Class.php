<?php
require_once 'Database.php';

class Visiteur {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db; 
    }

    public function consulterCatalogue() {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM activite WHERE archive = 0");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
