<?php
class user{
  private $id_user;
  private $nom;
  private $prenom;
  private $email;
  private $login;
  private $password;
  private $role;

  public function __construct($id_user,$nom,$prenom,$email,$login,$password,$role){
    this->$id_user=$id_user;
    this->$nom=$nom;
    this->$prenom=$prenom;
    this->$email=$email;
    this->$login=$login;
    this->$password = $password;
    this->$role = $role;
  }

    // Getter and Setter for id_user
    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
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

    // Getter and Setter for email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter and Setter for login
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    // Getter and Setter for password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Getter and Setter for role
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

}
?>
