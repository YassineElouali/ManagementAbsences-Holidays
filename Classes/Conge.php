<?php


class Conge {

    private $id;
    private $ide;
    private $type;
    private $jdebut;
    private $jfin;
    private $etat;
    private $ddc;
   
    
    function __construct($id, $ide, $type, $jdebut, $jfin, $etat, $ddc) {
        $this->id = $id;
        $this->ide = $ide;
        $this->type = $type;
        $this->jdebut = $jdebut;
        $this->jfin = $jfin;
        $this->etat = $etat;
        $this->ddc = $ddc;
    }

    function getId() {
        return $this->id;
    }

    function getIde() {
        return $this->ide;
    }

    function getType() {
        return $this->type;
    }

    function getJdebut() {
        return $this->jdebut;
    }

    function getJfin() {
        return $this->jfin;
    }

    function getEtat() {
        return $this->etat;
    }

    function getDdc() {
        return $this->ddc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIde($ide) {
        $this->ide = $ide;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setJdebut($jdebut) {
        $this->jdebut = $jdebut;
    }

    function setJfin($jfin) {
        $this->jfin = $jfin;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setDdc($ddc) {
        $this->ddc = $ddc;
    }

    
    function afficher() {

        echo "id : " . $this->id . " Jour debut : " . $this->jdebut . " Jour fin :" . $this->jfin . " Etat : " . $this->etat .
        " Date demande de ce conge : " . $this->ddc .
        " id de l employe : " . $this->ide . " type de ce conge : " . $this->type."<br>";
    }

}

?>