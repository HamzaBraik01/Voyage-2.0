<?php
require_once 'DB.Class.php';
abstract class User {
    protected $id_user;
    protected $nom;
    protected $prenom;
    protected $password;
    protected $telephone;
    protected $adresse;
    protected $date_naissance;
    protected $archive;
    protected $id_role;

    public function __construct($id, $nom, $email, $password, $telephone, $adresse, $date_naissance, $archive, $id_role) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->date_naissance = $date_naissance;
        $this->archive = $archive;
        $this->id_role = $id_role;
    }
    

    public static function authentifier($email, $password, $db) {
        $conn = $db->getConnection();

        // Recherche de l'utilisateur
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND archive = 0");
        $stmt->execute([$email]);

        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Retourne l'utilisateur authentifié
        }
        return false; // Échec de l'authentification
    }

    public function register() {
        $conn = Database::getInstance()->getConnection();
        $stmt = $conn->prepare("INSERT INTO user (nom, prenom, email, password, telephone, adresse, date_naissance, id_role) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->nom,
            $this->prenom,
            $this->email,
            password_hash($this->password, PASSWORD_DEFAULT),
            $this->telephone,
            $this->adresse,
            $this->date_naissance,
            $this->id_role
        ]);
    }
}
?>