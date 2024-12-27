<?php
require_once 'User.Class.php';
require_once 'Database.php';

class Admin extends User {
    public function bannirUser($db, $id_user) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE user SET etat = 'banni' WHERE id_user = ? AND id_role = 3");
        return $stmt->execute([$id_user]);
    }
}
?>
