<?php
require_once 'Database.php';

class Activite {
    private $id_activite;
    private $titre;
    private $description;
    private $prix;
    private $date_debut;
    private $date_fin;
    private $place_dispo;
    private $archive;

    public function __construct($titre = '', $description = '', $prix = 0, $date_debut = '', $date_fin = '', $place_dispo = 0, $archive = 0) {
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->place_dispo = $place_dispo;
        $this->archive = $archive;
    }
    

    public function ajouterActivite($db) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO activite (titre, description, prix, date_debut, date_fin, place_dispo) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->titre, 
            $this->description, 
            $this->prix, 
            $this->date_debut, 
            $this->date_fin, 
            $this->place_dispo
        ]);
    }
}
?>
