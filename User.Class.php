<?php
require_once 'DB.Class.php';

abstract class User {
    protected $id_user;
    protected $nom;
    protected $prenom;
    protected $date_naissance;
    protected $telephone;
    protected $email;
    protected $mot_de_passe;
    protected $etat;
    protected $id_role;

    public function __construct($id_user, $nom, $prenom, $date_naissance, $telephone, $email, $mot_de_passe, $etat, $id_role) {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->etat = $etat;
        $this->id_role = $id_role;
    }

    public static function authentifier($email, $password, $db) {
        $conn = $db->getConnection();

        // Recherche de l'utilisateur
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND etat = 'actif'");
        $stmt->execute([$email]);

        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            return $user; // Retourne l'utilisateur authentifié
        }
        return false; // Échec de l'authentification
    }

    public function register($db) {
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO user (nom, prenom, date_naissance, telephone, email, mot_de_passe, etat, id_role) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->nom,
            $this->prenom,
            $this->date_naissance,
            $this->telephone,
            $this->email,
            password_hash($this->mot_de_passe, PASSWORD_DEFAULT),
            $this->etat,
            $this->id_role
        ]);
    }
}
?>
