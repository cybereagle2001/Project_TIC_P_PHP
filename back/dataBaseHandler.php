<?php
require_once 'salle/Salle.php';

class DatabaseHandler {
    private $pdo;

    public function __construct() {
        // Database connection parameters
        $host = 'localhost';
        $db = 'GYM';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        // Set up the database connection
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getSalles() {
        $sql = 'SELECT s.id_salle, s.nom_salle, s.capacity, s.type, s.id_club, c.nom_club, c.adresse 
                FROM salle s
                JOIN club c ON s.id_club = c.id_club';

        $stmt = $this->pdo->query($sql);
        $salles = [];
        while ($row = $stmt->fetch()) {
            $salles[] = new Salle(
                $row['id_salle'],
                $row['nom_salle'],
                $row['capacity'],
                $row['type'],
                [
                    'id_club' => $row['id_club'],
                    'nom_club' => $row['nom_club'],
                    'adresse' => $row['adresse']
                ]
            );
        }
        return $salles;
    }

    public function addSalle($nom_salle, $capacity, $type_id, $id_club) {
        $sql = "INSERT INTO salle (nom_salle, capacity, type, id_club) VALUES (:nom_salle, :capacity, :type_id, :id_club)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom_salle' => $nom_salle,
            'capacity' => $capacity,
            'type_id' => $type_id,
            'id_club' => $id_club
        ]);
    }

    public function getClubs() {
        $stmt = $this->pdo->query('SELECT id_club, nom_club FROM club');
        return $stmt->fetchAll();
    }
}
?>
