<?php
require_once 'DB.Class.php';
class Authentication {
    private $db;
    
    public function __construct(Database $database) {
        $this->db = $database;
    }
    
    public function register($userData) {
        try {
            if ($this->emailExists($userData['email'])) {
                return [
                    'success' => false,
                    'message' => 'Cet email est déjà utilisé.'
                ];
            }
            
            $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (nom, prenom, date_naissance, telephone, email, mot_de_passe, id_role) 
                    VALUES (:nom, :prenom, :date_naissance, :telephone, :email, :mot_de_passe, :id_role)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $success = $stmt->execute([
                ':nom' => htmlspecialchars($userData['nom']),
                ':prenom' => htmlspecialchars($userData['prenom']),
                ':date_naissance' => $userData['date_naissance'],
                ':telephone' => htmlspecialchars($userData['telephone']),
                ':email' => filter_var($userData['email'], FILTER_SANITIZE_EMAIL),
                ':mot_de_passe' => $hashedPassword,
                ':id_role' => 3 
            ]);
            
            if ($success) {
                return [
                    'success' => true,
                    'message' => 'Inscription réussie !'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Erreur lors de l\'inscription.'
                ];
            }
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Erreur lors de l\'inscription: ' . $e->getMessage()
            ];
        }
    }
    
    public function login($email, $password) {
        try {
            $sql = "SELECT * FROM user WHERE email = :email AND etat = 'actif'";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['mot_de_passe'])) {
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['id_role'];

                if ($user['id_role'] == 3) {
                    header('Location: dasheboredclient.php');
                    exit();
                } elseif ($user['id_role'] == 2) {
                    header('Location: dashboredAdmin.php');
                    exit();
                }

                return [
                    'success' => true,
                    'message' => 'Connexion réussie !'
                ];
            }
            
            return [
                'success' => false,
                'message' => 'Email ou mot de passe incorrect.'
            ];
            
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Erreur lors de la connexion: ' . $e->getMessage()
            ];
        }
    }
    
    private function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
    }
    
    public function logout() {
        session_start();
        session_destroy();
        return ;
    }
}
?>