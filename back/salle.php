<?php
 class salle{
  private $id_salle;
  private $nom_salle;
  private $capacity;
  private $salle_type;


  public function __construct($id_salle,$nom_salle,$capacity,$salle_type){
    this->$id_salle = $id_salle;
    this->$nom_salle = $nom_salle;
    this->$capacity = $capacity;
    this->$salle_type = $salle_type;
  }
    // Getter and Setter for id_salle
    public function getIdSalle() {
        return $this->id_salle;
    }

    public function setIdSalle($id_salle) {
        $this->id_salle = $id_salle;
    }

    // Getter and Setter for nom_salle
    public function getNomSalle() {
        return $this->nom_salle;
    }

    public function setNomSalle($nom_salle) {
        $this->nom_salle = $nom_salle;
    }

    // Getter and Setter for capacity
    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    // Getter and Setter for Salle_Type
    public function setSalleType($salle_type){
        $this->salle_type = $salle_type;
    }
    public function getSalleType(){
      return $this->salle_type;
    }
}
?>
