<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/_PROJETOS/traffic/App/db/Database.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/_PROJETOS/trafego-aereo/App/db/Database.php';

class Admin {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    public function login($username, $password) {
        $conn = $this->db->conectar();
        

        $query = "SELECT * FROM admin WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                return true; 
            }
        }
        return false; 
    }


    public function isLoggedIn() {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }


    public function cadastrarAdmin($username, $password) {
        $conn = $this->db->conectar();

        $query = "SELECT * FROM admin WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return false;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO admin (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
