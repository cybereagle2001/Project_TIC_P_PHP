<?php
class Club{
  private $id_club;
  private $nom_club;
  private $adresse;
  private $numero_tel;
  private $heure_ouverture;
  private $heure_fermeture;
  private $db;

    public function __construct($id_club, $nom_club, $adresse, $numero_tel, $heure_ouverture, $heure_fermeture,$db) {
        $this->id_club = $id_club;
        $this->nom_club = $nom_club;
        $this->adresse = $adresse;
        $this->numero_tel = $numero_tel;
        $this->heure_ouverture = $heure_ouverture;
        $this->heure_fermeture = $heure_fermeture;

        $this->$db = new PDO('mysql:host=localhost;dbname=gym',"root","");
    }
      // Getter and Setter for id_club
    public function getIdClub() {
        return $this->id_club;
    }

    public function setIdClub($id_club) {
        $this->id_club = $id_club;
    }

    // Getter and Setter for nom_club
    public function getNomClub() {
        return $this->nom_club;
    }

    public function setNomClub($nom_club) {
        $this->nom_club = $nom_club;
    }

    // Getter and Setter for adresse
    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    // Getter and Setter for numero_tel
    public function getNumeroTel() {
        return $this->numero_tel;
    }

    public function setNumeroTel($numero_tel) {
        $this->numero_tel = $numero_tel;
    }

    // Getter and Setter for heure_ouverture
    public function getHeureOuverture() {
        return $this->heure_ouverture;
    }

    public function setHeureOuverture($heure_ouverture) {
        $this->heure_ouverture = $heure_ouverture;
    }

    // Getter and Setter for heure_fermeture
    public function getHeureFermeture() {
        return $this->heure_fermeture;
    }

    public function setHeureFermeture($heure_fermeture) {
        $this->heure_fermeture = $heure_fermeture;
    }

}
?>
