<?php

class EmpService {

    private $ids;
    private $ide;
    private $dated;
    private $datef;

    function __construct($ids, $ide, $dated, $datef) {
        $this->ids = $ids;
        $this->ide = $ide;
        $this->dated = $dated;
        $this->datef = $datef;
    }

    function getIds() {
        return $this->ids;
    }

    function getIde() {
        return $this->ide;
    }

    function getDated() {
        return $this->dated;
    }

    function getDatef() {
        return $this->datef;
    }

    function setIds($ids) {
        $this->ids = $ids;
    }

    function setIde($ide) {
        $this->ide = $ide;
    }

    function setDated($dated) {
        $this->dated = $dated;
    }

    function setDatef($datef) {
        $this->datef = $datef;
    }

        function afficher() {

        echo "id employe: " . $this->ide . " Id service : " . $this->ids . " Date debut :" . $this->dated .
        "Date fin : " . $this->datef . "<br>";
    }

}

?>