<?php
require_once 'User.Class.php';
require_once 'Database.php';

class Admin extends User {
    public function bannirUser($db, $id_user) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE user SET etat = 'banni' WHERE id_user = ? AND id_role = 3");
        return $stmt->execute([$id_user]);
    }
    public function selectionnerClients($db) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT u.id_user, u.nom, u.prenom, u.date_naissance, u.telephone, u.email, u.etat 
                                FROM user u 
                                JOIN role r ON u.id_role = r.id_role 
                                WHERE r.nom_role = 'Client'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}
?>
