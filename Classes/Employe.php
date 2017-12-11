<?php

class Employe {

    private $id;
    private $eg;
    private $nom;
    private $prenom;
    private $tel;
    private $adresse;
    private $email;
    private $mdp;
    private $salaire;
    private $dater;
    private $solde;
    function __construct($id, $eg, $nom, $prenom, $tel, $adresse, $email, $mdp, $salaire, $dater, $solde) {
        $this->id = $id;
        $this->eg = $eg;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->salaire = $salaire;
        $this->dater = $dater;
        $this->solde = $solde;
    }
    function getId() {
        return $this->id;
    }

    function getEg() {
        return $this->eg;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getTel() {
        return $this->tel;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getEmail() {
        return $this->email;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getSalaire() {
        return $this->salaire;
    }

    function getDater() {
        return $this->dater;
    }

    function getSolde() {
        return $this->solde;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEg($eg) {
        $this->eg = $eg;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setSalaire($salaire) {
        $this->salaire = $salaire;
    }

    function setDater($dater) {
        $this->dater = $dater;
    }

    function setSolde($solde) {
        $this->solde = $solde;
    }

    
    

      

    function afficher() {

        echo "id : " . $this->id . " Nom et prenom : " . $this->nom . " " . $this->prenom . " Tel :" . $this->tel . " Adresse : " . $this->adresse . " Salaire : " . $this->salaire .
        " Solde : " . $this->solde . " Mot de passe : " . $this->mdp . " Date de recrutement : " .
        $this->dater . " grade" . $this->eg . "<br>";
    }

}

?>