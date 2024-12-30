<?php
require_once 'User.Class.php';
require_once 'DB.Class.php';

class Client extends User {
    private $db;

    /*public function __construct($data = []) {
        parent::__construct($data); // Appel du constructeur parent pour initialiser les propriétés de User
        $this->db = new Database(); // Création de l'instance Database directement dans le constructeur
    }*/
    public function __construct($db) {
        $this->db = $db; 
    }

    public function ajouterReservation($id_activite) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO reservation (id_user, id_activite) VALUES (?, ?)");
        return $stmt->execute([$this->id_user, $id_activite]);
    }
    public function afficherTousLesClients() {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("
            SELECT id_user, nom, prenom, email, telephone, etat 
            FROM `user` 
            WHERE `id_role` = 3
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getArchivedUsers() {
        $stmt = $this->db->prepare("SELECT * FROM `user` WHERE `id_role` = 3 AND `etat` = 'archive'");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function bannirUtilisateur($id_user) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE `user` SET `etat` = 'banni' WHERE `id_user` = ?");
        return $stmt->execute([$id_user]);
    }
    
    public function archiverUtilisateur($id_user) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE `user` SET `etat` = 'archive' WHERE `id_user` = ?");
        return $stmt->execute([$id_user]);
    }
}
?>
