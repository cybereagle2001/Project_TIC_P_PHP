<?php
  class coach{
    private $id;
    private $nom;
    private $prenom;
    private $prix_cours;

    public function __constructor($id,$nom,$prenom,$prix_cours){
      this->$id = $id;
      this->$nom = $nom;
      this->$prenom = $prenom;
      this->$prix_cours = $prix_cours;
    }
      // Getter and Setter for id
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    // Getter and Setter for nom
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    // Getter and Setter for prenom
    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    // Getter and Setter for prix_cours
    public function getPrixCours() {
        return $this->prix_cours;
    }
    public function setPrixCours($prix_cours) {
        $this->prix_cours = $prix_cours;
    }
    // Method to display the coach details
    public function display_coach() {
        echo "ID: " . $this->id . "\n";
        echo "Nom: " . $this->nom . "\n";
        echo "Prenom: " . $this->prenom . "\n";
        echo "Prix des Cours: " . $this->prix_cours . "\n";
    }
}
?>
