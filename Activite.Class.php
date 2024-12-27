<?php
require_once 'DB.Class.php';

class Activite {
    private $id_activite;
    private $titre;
    private $description;
    private $prix;
    private $date_debut;
    private $date_fin;
    private $place_dispo;
    private $type;
    private $image_url;

    public function __construct($titre = '', $description = '', $prix = 0, $date_debut = '', $date_fin = '', $place_dispo = 0, $type = null, $image_url = null) {
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->place_dispo = $place_dispo;
        $this->type = $type;
        $this->image_url = $image_url;
    }

    public function ajouterActivite($db) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO activite (titre, description, prix, date_debut, date_fin, place_dispo, type, image_url) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->titre, 
            $this->description, 
            $this->prix, 
            $this->date_debut, 
            $this->date_fin, 
            $this->place_dispo, 
            $this->type,
            $this->image_url 
        ]);
    }

    public function getIdActivite() {
        return $this->id_activite;
    }

    public function setIdActivite($id_activite) {
        $this->id_activite = $id_activite;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function getPlaceDispo() {
        return $this->place_dispo;
    }

    public function setPlaceDispo($place_dispo) {
        $this->place_dispo = $place_dispo;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getImageUrl() {
        return $this->image_url;
    }

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }
}
?>
