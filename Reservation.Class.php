<?php
require_once 'DB.Class.php';
class Reservation {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getReservationsWithUserInfo() {
        $conn = $this->db->getConnection();
        $query = "SELECT r.*, u.nom, u.prenom, a.titre as activite_titre 
                    FROM reservation r 
                    INNER JOIN user u ON r.id_user = u.id_user 
                    INNER JOIN activite a ON r.id_activite = a.id_activite
                    WHERE u.id_role = 3 
                    ORDER BY r.date_reservation DESC";
        
        $stmt = $conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateReservationStatus($id_reservation, $status) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE reservation SET statut = ? WHERE id_reservation = ?");
        return $stmt->execute([$status, $id_reservation]);
    }
}
?>
