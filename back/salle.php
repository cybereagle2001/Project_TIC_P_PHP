class salle{
  private $id_salle;
  private $nom_salle;
  private $capacity;


  public function __construct($id_salle,$nom_salle,$capacity){
    this->$id_salle = $id_salle;
    this->$nom_salle = $nom_salle;
    this->$capacity = $capacity;
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
  
}
