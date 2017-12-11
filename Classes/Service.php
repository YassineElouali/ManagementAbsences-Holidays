<?php

class Service{
    
    private $ids;
    private $libelle;
    
    function __construct($ids, $libelle) {
        $this->ids = $ids;
        $this->libelle = $libelle;
    }

    function getIds() {
        return $this->ids;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setIds($ids) {
        $this->ids = $ids;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

            function afficher()
    {
        
echo "id service: ".$this->ids." libelle : ".$this->libelle."<br>";        
    }
               
    
}


?>