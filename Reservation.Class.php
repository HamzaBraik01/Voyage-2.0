<?php
require_once 'DB.Class.php';
class Reservation {
    private $id_reservation;
    private $id_user;
    private $id_activite;
    private $statut;
    private $date_reservation;

    public function ajouterReservation($db, $id_user, $id_activite) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO reservation (id_user, id_activite) VALUES (?, ?)");
        return $stmt->execute([$id_user, $id_activite]);
    }

    public static function obtenirReservations($db) {
        $conn = $db->getConnection();
        $stmt = $conn->query("SELECT * FROM reservation");
        return $stmt->fetchAll();
    }
}
?>
