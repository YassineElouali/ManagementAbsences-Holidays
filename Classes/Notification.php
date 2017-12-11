<?php
class Notification{
    
    private $id;
    private $ids;
    private $libelle;
    
    
    function __construct($id, $ids, $libelle) {
        $this->id = $id;
        $this->ids = $ids;
        $this->libelle = $libelle;
    }

    function getId() {
        return $this->id;
    }

    function getIds() {
        return $this->ids;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIds($ids) {
        $this->ids = $ids;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }


    
    
    
    


    
}
?>

