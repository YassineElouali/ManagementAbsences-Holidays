<?php

class absence{

    private $id;
     private $ide ;
    private $jours;
    private $motif;
    private $etat;
    private $dda;
   
    function __construct($id, $ide, $jours, $motif, $etat, $dda) {
        $this->id = $id;
        $this->ide = $ide;
        $this->jours = $jours;
        $this->motif = $motif;
        $this->etat = $etat;
        $this->dda = $dda;
    }

    function getId() {
        return $this->id;
    }

    function getIde() {
        return $this->ide;
    }

    function getJours() {
        return $this->jours;
    }

    function getMotif() {
        return $this->motif;
    }

    function getEtat() {
        return $this->etat;
    }

    function getDda() {
        return $this->dda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIde($ide) {
        $this->ide = $ide;
    }

    function setJours($jours) {
        $this->jours = $jours;
    }

    function setMotif($motif) {
        $this->motif = $motif;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setDda($dda) {
        $this->dda = $dda;
    }

        
        
    
        function afficher()
    {
        
echo "id : ".$this->id." Jour  : ".$this->jours." motif :".$this->motif." Etat : ".$this->etat.
        " Date demande d'absence : ".$this->dda.
        " id de l employe : ".$this->ide."<br>";        
    }
               
    
}


?>