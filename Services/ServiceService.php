<?php

include_once '../Classes/Service.php';
include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';

class ServiceService implements IDao {

    private $listService = array();
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($Service) {
        $query = "INSERT INTO service (SID,SLIBELLE) VALUES ('" . $Service->getIds() . "','" . $Service->getLibelle() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Service WHERE SID = '" . $id . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function getAll() {
        $query = "select * from service";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listService[] = new Service($affichage->SID, $affichage->SLIBELLE);
        }
        return $this->listService;
    }

    public function getById($id) {
        $query = "select * from service WHERE SID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $s = new Service($affichage->SID, $affichage->SLIBELLE);
        }
        return $s;
    }

    public function update($Service) {
        $query = "UPDATE service
SET SLIBELLE='" . $Service->getLibelle() . "'
WHERE SID='" . $Service->getIds() . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function auth($a, $b) {
        
    }

    public function getAllByid($a) {
        
    }

}

?>
