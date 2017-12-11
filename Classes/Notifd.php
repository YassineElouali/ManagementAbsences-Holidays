<?php
class Notifd{
    
    private $id;
    private $idd;
    private $libelle;
    private $ntype;
    
    
    function __construct($id, $idd, $libelle, $ntype) {
        $this->id = $id;
        $this->idd = $idd;
        $this->libelle = $libelle;
        $this->ntype = $ntype;
    }
    function getId() {
        return $this->id;
    }

    function getIdd() {
        return $this->idd;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getNtype() {
        return $this->ntype;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdd($idd) {
        $this->idd = $idd;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setNtype($ntype) {
        $this->ntype = $ntype;
    }


    


    
}
?>

