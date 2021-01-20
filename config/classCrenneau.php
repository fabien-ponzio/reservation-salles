<?php
class Creneaux {
    private $pdo;
    public $lengthEvents = [];
    public $eventfortheWeek = [];

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    }
    public function getEventsBetween(DateTime $start, DateTime $end): array {
        $sql = "SELECT reservation.id, reservations.titre, reservation.debut, reservation.fin, utilisateurs FROM reservation JOIN utlilisateurs WHERE debut BETWEEN '{$start->format('Y-m-d 08:00:00')}' AND '{$end->format('Y-m-d 19:00:00')}' AND utilisateurs.id = reservation.id_utilisateur";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
}
?>