<?php
class cours{
  private $id_cours;
  private $nom_cours;
  private $duration;
  private $type;

  public function __construct($id_cours,$nom_cours,$duration,$type){
    this->$id_cours = $id_cours;
    this->$nom_cours = $nom_cours;
    this->$duration = $duration;
    this->$type = $type;
  }

  // define the getters and setters 
  public function getIdCours(){
    return this->$id_cours;
  }
  public function setIdCours($id){
    this->$id_cours = $id;
  }
  public function getNomCours($nom_cours){
    return this->$nom_cours;
  }
  public function setNomCours($nom_cours){
    this->$nom_cours = $nom_cours;
  }
  public function setDuration($duration){
    this->$duration = $duration;
  }
  public function getDuration($duration){
    return this->$duration;
  }
  public function getType($type){
    return this->$type;
  }
  public function setType($type){
    this->$type = $type;
  }
}
?>
