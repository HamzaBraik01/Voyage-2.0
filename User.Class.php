<?php

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

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function authentifier() {
        // Basic authentication logic
        $conn = Database::getInstance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ? AND archive = 0");
        $stmt->execute([$this->email, $this->password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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