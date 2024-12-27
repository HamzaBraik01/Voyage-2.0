<?php
require_once 'User.Class.php';
require_once 'DB.Class.php';

class Client extends User {
    private $db;

    public function __construct($data = []) {
        parent::__construct($data); // Appel du constructeur parent pour initialiser les propriétés de User
        $this->db = new Database(); // Création de l'instance Database directement dans le constructeur
    }

    public function ajouterReservation($id_activite) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO reservation (id_user, id_activite) VALUES (?, ?)");
        return $stmt->execute([$this->id_user, $id_activite]);
    }
}
?>
